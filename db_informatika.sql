-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2018 at 04:07 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_informatika`
--

-- --------------------------------------------------------

--
-- Table structure for table `absens`
--

CREATE TABLE `absens` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_group` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pertemuan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absens`
--

INSERT INTO `absens` (`id`, `id_group`, `pertemuan`, `created_at`, `updated_at`) VALUES
(1, '200466436', '1', '2018-07-16 08:53:33', '2018-07-16 08:53:33'),
(2, '738858803', '2', '2018-07-24 04:04:25', '2018-07-24 04:04:25'),
(3, '738858803', '1', '2018-08-01 08:01:55', '2018-08-01 08:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `all_nilais`
--

CREATE TABLE `all_nilais` (
  `id_all_nilai` int(10) UNSIGNED NOT NULL,
  `noinduk` int(10) UNSIGNED NOT NULL,
  `id_group` int(10) UNSIGNED NOT NULL,
  `nilai` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `all_nilais`
--

INSERT INTO `all_nilais` (`id_all_nilai`, `noinduk`, `id_group`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 14100001, 738858803, 414, '2018-08-05 06:03:51', '2018-08-05 07:34:15'),
(2, 14100010, 738858803, 283, '2018-08-05 06:16:19', '2018-08-05 06:27:43'),
(3, 14100018, 738858803, 304, '2018-08-05 06:31:50', '2018-08-05 06:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `ambil_absens`
--

CREATE TABLE `ambil_absens` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_group` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noinduk` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pertemuan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ambil_absens`
--

INSERT INTO `ambil_absens` (`id`, `id_group`, `noinduk`, `pertemuan`, `created_at`, `updated_at`) VALUES
(1, '200466436', '14100018', '1', '2018-07-16 08:58:52', '2018-07-16 08:58:52'),
(2, '738858803', '14100001', '2', '2018-07-24 04:07:08', '2018-07-24 04:07:08'),
(3, '738858803', '14100010', '2', '2018-07-24 13:28:14', '2018-07-24 13:28:14'),
(4, '738858803', '14100018', '2', '2018-07-24 13:46:34', '2018-07-24 13:46:34'),
(5, '738858803', '14100001', '1', '2018-08-01 08:03:07', '2018-08-01 08:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id` int(10) UNSIGNED NOT NULL,
  `berita` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beritas`
--

INSERT INTO `beritas` (`id`, `berita`, `created_at`, `updated_at`) VALUES
(1, '<p>penguguman</p>', '2018-07-17 16:58:18', '2018-07-17 16:58:18');

-- --------------------------------------------------------

--
-- Table structure for table `biodatas`
--

CREATE TABLE `biodatas` (
  `noinduk` int(11) NOT NULL,
  `namadepan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namabelakang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenkel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nohp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biodatas`
--

INSERT INTO `biodatas` (`noinduk`, `namadepan`, `namabelakang`, `email`, `jenkel`, `tempat`, `tgl_lahir`, `nohp`, `alamat`, `created_at`, `updated_at`) VALUES
(14100001, 'Rahma', 'Yani', 'rahma@rahma.com', 'P', 'padang', '1995-02-12', '9790098', 'padang', '0000-00-00 00:00:00', '2018-07-24 15:26:16'),
(14100002, 'Mirnawati', ' ', 'mirna@mirna.com', 'P', 'padang', '0000-00-00', '98749872389', 'padang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100003, 'Febri', 'Ramadona', 'febri@febri.com', 'P', 'padang', '0000-00-00', '9079870', 'padang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100004, 'Jumiati', ' ', 'jumi@jumi.com', 'P', 'padang', '0000-00-00', '321421421', 'padang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100005, 'Desi', 'Ariani', 'desi@desi.com', 'P', 'padang', '0000-00-00', '89797', 'padang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100006, 'Syafrila', 'Haris', 'aril@aril.com', 'L', 'padang', '0000-00-00', '8721397912', 'padang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100007, 'Renni', 'Febrina', 'reni@reni.com', 'P', 'padang', '0000-00-00', '9080809', 'padang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100008, 'Trimay', 'Anggreini', 'trimai@trimai.com', 'P', 'Sikakap', '0000-00-00', '974392807', 'padang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100009, 'Herisvan', 'Hendra', 'herisvan@herisvan.com', 'L', 'padang', '0000-00-00', '87979', 'padang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100010, 'Putri', 'Andam Dewi', 'andam@andam.com', 'P', 'padang', '0000-00-00', '981309', 'padang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100011, 'Riyan', 'Kurnia', 'riyan@riyan.com', 'L', 'padang', '0000-00-00', '987987', 'padang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100012, 'Desma', 'Yulita', 'desma@desma.com', 'P', 'padang', '0000-00-00', '987987', 'padang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100013, 'Novriadi', 'S.Pd', 'novri@novri.com', 'L', 'Surantih', '1994-10-11', '987987', 'padang', '0000-00-00 00:00:00', '2018-07-25 07:46:00'),
(14100014, 'Gusdianto', 'Ade Putra', 'ade@ade.com', 'L', 'padang', '0000-00-00', '987987', 'padang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100015, 'Yulia', 'Putri', 'yulian@yulia.com', 'P', 'padang', '0000-00-00', '987987', 'padang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100016, 'Silvia', 'Yulanda', 'silvia@silvia', 'P', 'Sikakap', '0000-00-00', '233423421', 'padang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100017, 'Jefri', 'Naldi', 'jefri@jefri.com', 'L', 'Sikakap', '0000-00-00', '233423422', 'padang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100018, 'Hotmaruliasi', 'Simanungkalit', 'rulisimanungkalit@yahoo.com', 'L', 'Sikakap', '0000-00-00', '233423423', 'padang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100019, 'Riki', 'Saputra', 'riki@riki.com', 'L', 'Sikakap', '0000-00-00', '233423424', 'padang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100020, 'Serli', 'Handayani', 'serli@serli.com', 'P', 'Sikakap', '0000-00-00', '233423425', 'padang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100021, 'Reza', 'Oktaliardi', 'reza@reza.com', 'L', 'Sikakap', '0000-00-00', '233423426', 'padang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100022, 'Asri', 'Yanti', 'asri@asri.com', 'P', 'Sikakap', '0000-00-00', '233423427', 'padang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100023, 'Nanda', 'Maidiana', 'nanda@nanda', 'P', 'Sikakap', '0000-00-00', '233423428', 'padang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100024, 'Gita', 'Septiani', 'gita@gita.com', 'P', 'Sikakap', '0000-00-00', '233423429', 'padang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100025, 'Aldi', 'Partison', 'aldi@aldi.com', 'P', 'Sikakap', '0000-00-00', '233423430', 'padang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100026, 'Ulfa', 'Alfa Shuhada', 'ulfa@ulfa.com', 'P', 'Sikakap', '0000-00-00', '233423431', 'padang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100027, 'Maya', 'kosong', 'maya@maya.com', 'P', 'Sikakap', '0000-00-00', '233423432', 'padang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100028, 'Mutia', 'Rahmayani', 'mutia@mutia.com', 'P', 'Sikakap', '0000-00-00', '233423433', 'padang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100029, 'Fajri', 'Rahman', 'fajri@fajri.com', 'L', 'Sikakap', '0000-00-00', '233423434', 'padang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100030, 'Ahmad', 'husaini', 'husain@husain.com', 'L', 'Sikakap', '0000-00-00', '233423435', 'padang', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100031, 'Keni', 'Gusdayanti', 'keni@keni.com', 'P', 'padang', '2018-08-06', '3242', 'padang', '2018-08-05 08:50:33', '2018-08-05 08:50:33'),
(14100033, 'Ria', 'Arlan Putri', 'tirsna@trisna.com', 'P', 'pariaman', '1995-09-27', '9890809', 'padang', '2018-08-05 08:47:57', '2018-08-05 08:58:11'),
(14100035, 'Trisna', 'Mardianti', 'tirsna@trisna.com', 'P', 'pariaman', '2018-08-14', '21313', 'padang', '2018-08-05 08:55:25', '2018-08-05 08:55:25'),
(14100044, 'Popy', 'Saputra', 'popy@popy.com', 'L', 'padang', '2018-08-22', '32424', 'padang', '2018-08-05 09:00:19', '2018-08-05 09:00:19'),
(21037201, 'Heri', 'Mulyono, S.Kom, M.Pd', 'heri@heri.com', 'L', 'padang', '2018-07-09', '78689', 'padang', '2018-07-23 15:04:25', '2018-07-23 15:04:25'),
(1005108502, 'Ellbert', 'Hutabri, M. Kom', 'ellber@ellber.com', 'L', 'padang', '2018-07-09', '09890890', 'padang', '2018-07-23 15:03:08', '2018-07-23 15:03:08'),
(1008036601, 'Ir.Hj.Nurmi,M.Kom', 'kosong', 'nurmi@nurmi.com', 'P', 'padang', '0000-00-00', '76787878', 'padang', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cek_dosens`
--

CREATE TABLE `cek_dosens` (
  `id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cek_dosens`
--

INSERT INTO `cek_dosens` (`id`, `nama`, `created_at`, `updated_at`) VALUES
('1005108502', 'ELLBERT HUTABRI, M.Kom', '2018-07-11 10:47:34', '2018-07-11 10:47:34'),
('1008036601', 'Ir. Hj. NURMI, M.Kom', '2018-07-11 10:47:34', '2018-07-11 10:47:34'),
('1017058002', 'THOMSON MARY, M.Kom', '2018-07-11 10:47:34', '2018-07-11 10:47:34'),
('1020048403', 'ADE PRATAMA, M.Kom', '2018-07-11 10:47:34', '2018-07-11 10:47:34'),
('1024048702', 'ADLIA ALFIRIANI, M.Pd', '2018-07-11 10:47:34', '2018-07-11 10:47:34'),
('1026048603', 'REGINA ADE DARMAN, M.Pd', '2018-07-11 10:47:34', '2018-07-11 10:47:34'),
('21037201', 'HERI MULYONO, S.Kom, M.Pd', '2018-07-11 10:47:34', '2018-07-11 10:47:34');

-- --------------------------------------------------------

--
-- Table structure for table `cek_mahasiswas`
--

CREATE TABLE `cek_mahasiswas` (
  `id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cek_mahasiswas`
--

INSERT INTO `cek_mahasiswas` (`id`, `nama`, `created_at`, `updated_at`) VALUES
('14100001', 'Rahma Yani', '2018-07-11 10:47:10', '2018-07-11 10:47:10'),
('14100002', 'Mirnawati', '2018-07-11 10:47:10', '2018-07-11 10:47:10'),
('14100003', 'Febry Fajar Ramadona', '2018-07-11 10:47:10', '2018-07-11 10:47:10'),
('14100004', 'Jumiati', '2018-07-11 10:47:10', '2018-07-11 10:47:10'),
('14100005', 'Desi Ariani', '2018-07-11 10:47:10', '2018-07-11 10:47:10'),
('14100006', 'Syafrilla Haris', '2018-07-11 10:47:10', '2018-07-11 10:47:10'),
('14100007', 'Renni Febrina', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100008', 'Trimay Anggraini', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100009', 'Herisvan Hendra', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100010', 'Putri Andam Dewi', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100011', 'Riyan Kurnia', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100012', 'Desma Yulita', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100013', 'Novriadi', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100014', 'Gusdianto Ade Putra', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100015', 'Yulia Putri', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100016', 'Silvia Yulanda', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100017', 'Jefri Naldi', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100018', 'Hotmaruliasi Simanungkalit', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100019', 'Riki Saputra', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100020', 'Sherly Handayany', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100021', 'Reza Oktaliardi', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100022', 'Asri Yanti', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100023', 'Nanda Meidiana', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100024', 'Gita Septiani', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100025', 'Aldi Partison', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100026', 'Ulfa Afra Syuhadda', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100027', 'Maya', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100028', 'Mutia Ramadhani', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100029', 'Fajri Rahman', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100030', 'Ahmad Husaini', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100031', 'Keni Gusdayanti', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100032', 'Rada Viosta Yuliarsi', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100033', 'Ria Arlan Putri', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100034', 'Rani Sagita', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100035', 'Trisna Mardiati', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100036', 'Iko Puji Anover', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100037', 'Nurhayatul Fadilla', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100038', 'Melisa', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100039', 'Lia Virgo', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100040', 'Afril Safputra', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100041', 'Sabtadela Efridawati', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100042', 'Fauzi Hendri', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100043', 'Andika Befni Pratama', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100044', 'Popy Saputra', '2018-07-11 10:47:11', '2018-07-11 10:47:11'),
('14100045', 'Yulima Nadia', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100046', 'Elsa Priska', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100047', 'Anggun', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100048', 'Wulandari', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100049', 'Melda Yanti', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100050', 'Kairul Abrar', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100051', 'Intan Noviana', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100052', 'Hendri Romanda', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100053', 'Lina Nadya', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100054', 'Lusi Mayasari', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100055', 'Sisca Ayu Rahmawati', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100056', 'M. Ikhsan', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100057', 'Dedi Ihsan', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100058', 'Julianus Saeppu', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100059', 'Cipribowo', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100060', 'Muara Meiyodha Pernaungan', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100061', 'Romi Efendi', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100062', 'Yuva Wulandari', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100063', 'Ridwan Putra', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100064', 'Afdhal Novrian', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100065', 'Mellia Sapra Putri', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100066', 'Fitria Hafizah', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100067', 'Maharani Wulandari', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100068', 'Angga Javalino', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100069', 'Anshorul Azda', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100070', 'Yogi Saputra', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100071', 'Riska Elma Yesi', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100072', 'Yulni Kasim', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100073', 'Indra Febrian', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100074', 'Arif Rahman', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100075', 'Andrizal Arifin Putra', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100076', 'Dicky Novendra', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100077', 'Monarisa', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100078', 'Yolni Afliza', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100079', 'Aldabert Apriman Waruwu', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100080', 'Alkamal', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100081', 'Shaifatul Hamdi', '2018-07-11 10:47:12', '2018-07-11 10:47:12'),
('14100082', 'Irawati', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('14100083', 'Darma Delita', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('14100084', 'Riza Afria Ningsih', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('14100085', 'Malik Abdul Aziz', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('14100086', 'Fitria Ramadhani', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('14100087', 'Laila Najmi', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('14100088', 'Maini Hikmawati Masril', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('14100089', 'Gusti Robi Putra', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('14100090', 'Yoga Fransisko', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('14100091', 'Ngalio Tiopanta', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('14100092', 'Doni Chandra Zulni', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('14100093', 'Nandito Pernando', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100001', 'Mia Saibuma', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100002', 'Ardonald Sakeru', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100003', 'Fauzi Agung Twinda Fatan', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100004', 'Difa Jumelia Fajri', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100005', 'Ninit Afrina', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100006', 'Yulia Fitra', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100007', 'Aulia Silfiana Kasakeyan', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100008', 'Gio Rahmadanu', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100009', 'Syahranil Wati', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100010', 'Pramanda Putra', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100011', 'Salsabila Restyani', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100012', 'Alan Firman Putra', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100013', 'Emi Mastura', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100014', 'Tika Fadillah', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100015', 'Nani Anjarwani', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100016', 'Risma Hidayati', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100017', 'Yumni Wahyuni', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100018', 'Muhammad Puja Yuliando', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100019', 'Vivi Elita', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100020', 'Mella Mimi Safitri', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100021', 'Evi Erdi Agustin', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100022', 'Vinta Sri Ayu Anisa', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100023', 'Amrah Muslimin', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100024', 'Syafwandi Juhandra', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100025', 'Yoga Norfadrian', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100026', 'Rere Solfia Fardila', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100027', 'Dilla Meliza', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100028', 'Hari Wando', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100029', 'Mardian Saputra', '2018-07-11 10:47:13', '2018-07-11 10:47:13'),
('15100030', 'Desi Susanti', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100031', 'Firdaus', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100032', 'Sutian Yuningsih', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100033', 'Ikke Meiriska', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100034', 'Welni Eria', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100035', 'Syinthia Eka Putri', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100036', 'Aidila Fatma', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100037', 'Mardi Ali', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100038', 'Welli Asmita', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100039', 'Edi Satria', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100040', 'Gefli Ramadhan', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100041', 'Randi Anggita', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100042', 'Winda Rahayu', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100043', 'Feri Desriwandi', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100044', 'Fanny Safitri Zarman', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100045', 'Gusriani Fransiska', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100046', 'Ridwan Saputra', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100047', 'Nikmatul Husna', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100048', 'Makmur', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100049', 'Sri Mulyati', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100050', 'Ade Syahputra', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100051', 'Ilham Pratama Putra', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100052', 'Lourena Mutiara Rilda', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100053', 'Hengki Yonanda Putra', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100054', 'Neni Mahyuni', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100055', 'Hikma Tunazila', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100056', 'Dhea Yunita Edwar', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100057', 'Reka Ananda Putri', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100058', 'Bayu Pratama', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100059', 'Rila Kurniawan', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100060', 'Imam Darul Ilmi', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100061', 'Rizky Saputra', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100062', 'Jeptalina Saleleusik', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100063', 'Syamsurizal', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('15100064', 'Rezki Muhammad', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('16100001', 'Nova Mega Sari', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('16100002', 'Ismayadi', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('16100003', 'Julpianus Sarereakek', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('16100004', 'Romi Julio', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('16100005', 'Dwi Yulia Safitri', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('16100006', 'Lidia Fuji Rahayu', '2018-07-11 10:47:14', '2018-07-11 10:47:14'),
('16100007', 'Febria Azilda', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('16100008', 'Githa Fadillah', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('16100009', 'Roza Lina', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('16100010', 'M. Ivan Nur Daegal', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('16100011', 'Aulia Apriliami', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('16100012', 'Agia Sepneta Putra', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('16100013', 'Feni Susilawati', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('16100014', 'Rewiko Farizqi', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('16100015', 'Indah Dwi Suryani', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('16100016', 'Herzi Marta Gustan', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('16100017', 'Andrian Suwitri', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('16100018', 'Yavinda Desma Yenti', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('16100019', 'Zikra Annisa', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('16100020', 'Annisa Syafira', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('16100021', 'Afri Doni', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('16100022', 'Fajar Agung Tri Rahmad', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('16100023', 'Salonika', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('16100024', 'Septia Amrullah', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('16100025', 'Hengki Saputra', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('16100026', 'Andika Arrohman', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('16100027', 'Mia Wati Saputri', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('16100028', 'Iis Ariska', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('16100029', 'Yunara Melisa Putri', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('16100030', 'Siska Maulina', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('16100031', 'Nersius Sabebeget', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('16100032', 'Tegar Akri Wiratama', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('16100033', 'Ghovi Afresal', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('17100001', 'Fauzi Nur Istanto', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('17100002', 'Fingki Raja Putra', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('17100003', 'Fransiskus', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('17100004', 'Zira Firli Ramadani', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('17100005', 'Popy Komala Sari', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('17100006', 'Rina Anggraini', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('17100007', 'Muhammad Ardhi', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('17100008', 'Epa Susanti', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('17100009', 'Sativa Sri Kumala Sari', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('17100010', 'Priska Amanah', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('17100011', 'Resi Restina', '2018-07-11 10:47:15', '2018-07-11 10:47:15'),
('17100012', 'Ibnu Ismail', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100013', 'Wiwin Lova Suwarseh', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100014', 'Elsi Fitriani', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100015', 'Veren Ferina', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100016', 'Yogi Mardiansyah Putra', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100017', 'Putri Andestia Aisyah', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100018', 'Nofrian Kamil', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100019', 'Wahfa Ramadhani', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100020', 'Jasnita', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100021', 'Meri Oktamia', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100022', 'Exfrizaldi', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100023', 'Sri Mareta', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100024', 'Yudi Rahman', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100025', 'Oktori Azmiardo', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100026', 'Mayang Saroiyaroh', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100027', 'Dince Ratna Deli', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100028', 'Rahmatul Hidayatul', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100029', 'Budi Kurniawan', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100030', 'Rizky Dwi Safitri', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100031', 'Syahrul Sidiq', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100032', 'Busra Yoli Afdal', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100033', 'Sindi Dwi Putri', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100034', 'Irfan Febra Yufa', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100035', 'Okma A. Pratiwi', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100036', 'Ridhatul Fajraini', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100037', 'Windi Agustiara', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100038', 'Fatimah', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100039', 'Sriyumi', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100040', 'Nola Sri', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100041', 'Anggria Putri', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100042', 'Muhammad Rijal', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100043', 'Zaritayani', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100044', 'Randi Audiva', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100045', 'Abdiman', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100046', 'Dwita Yolanda', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100047', 'Rima Suci Anggraini', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100048', 'Ikmallul Hidayah', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100049', 'Cavin Nugraha', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100050', 'Irda Silvia Ningsih', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100051', 'Hidayat Saputra', '2018-07-11 10:47:16', '2018-07-11 10:47:16'),
('17100052', 'Putri Oktariani', '2018-07-11 10:47:16', '2018-07-11 10:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `fotos`
--

CREATE TABLE `fotos` (
  `id` int(10) UNSIGNED NOT NULL,
  `noinduk` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fotos`
--

INSERT INTO `fotos` (`id`, `noinduk`, `foto`, `created_at`, `updated_at`) VALUES
(1, '1', '20180711183358.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '1008036601', '20180718151505.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '14100009', 'foto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '14100018', '20180729061721.jpg', '0000-00-00 00:00:00', '2018-07-28 23:17:21'),
(5, '14100001', '20180724222424.jpg', '0000-00-00 00:00:00', '2018-07-24 15:24:24'),
(6, '14100002', 'foto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '14100003', 'foto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '14100004', 'foto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '14100005', 'foto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '14100006', 'foto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '14100007', 'foto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '14100008', 'foto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, '14100010', 'foto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '14100011', 'foto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '14100012', 'foto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, '14100013', '20180725144450.png', '0000-00-00 00:00:00', '2018-07-25 07:44:50'),
(17, '14100014', 'foto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, '14100015', 'foto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, '14100016', 'foto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, '14100017', '20180728145948.png', '0000-00-00 00:00:00', '2018-07-28 07:59:48'),
(21, '14100018', 'foto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, '14100019', 'foto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, '14100020', 'foto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, '14100021', 'foto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, '14100022', 'foto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, '14100023', 'foto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, '14100024', 'foto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, '14100025', 'foto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, '14100026', 'foto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, '14100027', 'foto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, '14100028', 'foto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, '14100029', 'foto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, '14100030', 'foto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, '1005108502', '20180725221244.jpg', '2018-07-23 15:03:15', '2018-07-25 15:12:44'),
(35, '21037201', 'foto', '2018-07-23 15:04:35', '2018-07-23 15:04:35'),
(36, '789123', '20180802224321.png', '2018-07-24 14:42:18', '2018-08-02 15:43:21'),
(37, '14100033', '20180805155838.png', '2018-08-05 08:48:12', '2018-08-05 08:58:38'),
(38, '14100031', 'foto', '2018-08-05 08:50:46', '2018-08-05 08:50:46'),
(39, '14100035', 'foto', '2018-08-05 08:56:39', '2018-08-05 08:56:39'),
(40, '14100044', 'foto', '2018-08-05 09:00:25', '2018-08-05 09:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `gabung_groups`
--

CREATE TABLE `gabung_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noinduk` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gabung_groups`
--

INSERT INTO `gabung_groups` (`id`, `id_group`, `noinduk`, `created_at`, `updated_at`) VALUES
(1, '200466436', '14100018', '2018-07-13 16:25:14', '2018-07-13 16:25:14'),
(2, '738858803', '14100001', '2018-07-24 02:34:54', '2018-07-24 02:34:54'),
(3, '738858803', '14100010', '2018-07-24 05:59:49', '2018-07-24 05:59:49'),
(4, '738858803', '14100018', '2018-07-24 13:45:48', '2018-07-24 13:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id_group` int(11) UNSIGNED NOT NULL,
  `noinduk` int(11) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pertemuan` int(11) NOT NULL,
  `type` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id_group`, `noinduk`, `judul`, `slug`, `deskripsi`, `pertemuan`, `type`, `created_at`, `updated_at`) VALUES
(168534129, 1005108502, 'PENGANTAR PENDIDIKAN 2014 A', 'pengantar-pendidikan-2014-a', 'PENGANTAR PENDIDIKAN 2014 A', 16, '0', '2018-07-23 16:16:08', '2018-07-23 16:16:08'),
(200466436, 1008036601, 'WEB DASAR 2017 A', 'web-dasar-2017-a', 'ini adalah', 16, '1', '2018-07-13 13:53:02', '2018-07-13 13:53:02'),
(388860090, 1005108502, 'Pemrograman Web 1 2014 A', 'pemrograman-web-1-2014-a', 'Pemrograman Web 1 2014 A', 16, '1', '2018-07-23 15:10:50', '2018-07-23 15:10:50'),
(738858803, 1005108502, 'Teknik Simulasi dan Permodelan', 'teknik-simulasi-dan-permodelan', 'Teknik Simulasi dan Permodelan', 16, '0', '2018-07-23 16:00:11', '2018-07-23 16:00:11');

-- --------------------------------------------------------

--
-- Table structure for table `homepesans`
--

CREATE TABLE `homepesans` (
  `id_pesan` int(10) UNSIGNED NOT NULL,
  `id_noinduk_1` int(10) UNSIGNED NOT NULL,
  `id_noinduk_2` int(10) UNSIGNED NOT NULL,
  `jumlah1` int(10) UNSIGNED NOT NULL,
  `jumlah2` int(10) UNSIGNED NOT NULL,
  `pesan_terakhir` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homepesans`
--

INSERT INTO `homepesans` (`id_pesan`, `id_noinduk_1`, `id_noinduk_2`, `jumlah1`, `jumlah2`, `pesan_terakhir`, `created_at`, `updated_at`) VALUES
(70057487, 1008036601, 14100018, 0, 0, 'dsa', '2018-07-17 14:41:10', '2018-07-17 16:21:31'),
(8667138, 1005108502, 14100001, 0, 0, 'test!', '2018-07-24 03:01:38', '2018-08-01 08:06:57');

-- --------------------------------------------------------

--
-- Table structure for table `jawabans`
--

CREATE TABLE `jawabans` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_kuis` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noinduk` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_soal` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pertemuan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` int(3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jawabans`
--

INSERT INTO `jawabans` (`id`, `id_kuis`, `noinduk`, `id_soal`, `soal`, `jawaban`, `pertemuan`, `bobot`, `nilai`, `created_at`, `updated_at`) VALUES
(1, '490541869', '14100018', '490541871', '<p>hkjlhjkxcsd</p>', '<p>now</p>', '1', '30', 30, '2018-07-13 16:39:30', '2018-07-14 08:21:15'),
(2, '490541869', '14100018', '490541872', '<p>csadcsa</p>', '<p>why</p>', '1', '12', 12, '2018-07-13 16:39:30', '2018-07-14 08:21:15'),
(3, '404931273', '14100001', '490541878', '<p>Sebutkan & Jelaskan fungsi dari komputer yang sering digunakan manusia ?</p>', '<p>memcahkan masalah</p>', '1', '20', 15, '2018-07-24 05:54:31', '2018-07-24 05:55:59'),
(4, '404931273', '14100001', '490541879', '<p>Apa sajakah yang termasuk komponen-komponen pada komputer ?</p>', '<p>mouse,keybord,monitor,cpu,</p>', '1', '20', 15, '2018-07-24 05:54:31', '2018-07-24 05:55:59'),
(5, '404931273', '14100001', '490541880', '<p>Jelaskan cara kerja pada komputer?</p>', '<p>mempermudah kerja</p>', '1', '20', 20, '2018-07-24 05:54:32', '2018-07-24 05:55:59'),
(6, '404931273', '14100001', '490541881', '<p>Sebutkan media apa sajakah yg terdapat pada input, process, maupun output pada cara  kerja    komputer ?</p>', '<p>input keybord,mouse</p>\r\n\r\n<p>proses Aplikasi</p>\r\n\r\n<p>output printer,monitor</p>', '1', '20', 10, '2018-07-24 05:54:32', '2018-07-24 05:55:59'),
(7, '404931273', '14100001', '490541882', '<p>Sebutkan dan jelaskan contoh Komputer mobile?</p>', '<p>smartphone</p>', '1', '20', 5, '2018-07-24 05:54:32', '2018-07-24 05:55:59'),
(8, '660694101', '14100010', '490541883', '<p>Apakah yang dimaksud dengan <em>Stored Program Computer</em>?</p>', '<p>cnksda jsdknaclk</p>', '2', '20', 10, '2018-07-24 13:29:12', '2018-07-24 13:30:11'),
(9, '660694101', '14100010', '490541884', '<p>Pada level sirkuit yang terintegrasi, apakah 3 bagian yang penting dari sistem computer dan jelaskan?</p>', '<p>dcnlkas nkjcdsan jknas</p>', '2', '30', 20, '2018-07-24 13:29:12', '2018-07-24 13:30:11'),
(10, '660694101', '14100010', '490541885', '<p>Apakah manfaat menggunakan arsitektur multiple-bus dibandingkan dengan arsitektur <em>single-</em><em>bus</em>?</p>', '<p>dsncl kjandsl</p>', '2', '30', 25, '2018-07-24 13:29:12', '2018-07-24 13:30:11'),
(11, '660694101', '14100010', '490541886', '<p>Sebutkan tentang media penyimpan data eksternal computer.?</p>', '<p>dkbcal jdanlc kljansd c</p>', '2', '20', 15, '2018-07-24 13:29:12', '2018-07-24 13:30:11'),
(12, '660694101', '14100001', '490541883', '<p>Apakah yang dimaksud dengan <em>Stored Program Computer</em>?</p>', '<p>kndas jksanclkd</p>', '2', '20', 10, '2018-07-24 13:38:40', '2018-07-24 13:40:44'),
(13, '660694101', '14100001', '490541884', '<p>Pada level sirkuit yang terintegrasi, apakah 3 bagian yang penting dari sistem computer dan jelaskan?</p>', '<p>sanlck kasndl</p>', '2', '30', 20, '2018-07-24 13:38:40', '2018-07-24 13:40:44'),
(14, '660694101', '14100001', '490541885', '<p>Apakah manfaat menggunakan arsitektur multiple-bus dibandingkan dengan arsitektur <em>single-</em><em>bus</em>?</p>', '<p>asncl saknl</p>', '2', '30', 30, '2018-07-24 13:38:40', '2018-07-24 13:40:44'),
(15, '660694101', '14100001', '490541886', '<p>Sebutkan tentang media penyimpan data eksternal computer.?</p>', '<p>naskjcln jkasnlc</p>', '2', '20', 20, '2018-07-24 13:38:40', '2018-07-24 13:40:44'),
(16, '660694101', '14100018', '490541883', '<p>Apakah yang dimaksud dengan <em>Stored Program Computer</em>?</p>', '<p>cdnajskl kjasndc jaslnd</p>', '2', '20', 10, '2018-07-24 13:46:28', '2018-07-24 13:47:30'),
(17, '660694101', '14100018', '490541884', '<p>Pada level sirkuit yang terintegrasi, apakah 3 bagian yang penting dari sistem computer dan jelaskan?</p>', '<p>san cdjkasdnckl jsakdnl</p>', '2', '30', 20, '2018-07-24 13:46:28', '2018-07-24 13:47:30'),
(18, '660694101', '14100018', '490541885', '<p>Apakah manfaat menggunakan arsitektur multiple-bus dibandingkan dengan arsitektur <em>single-</em><em>bus</em>?</p>', '<p>cndka&nbsp; jsadknckas</p>', '2', '30', 30, '2018-07-24 13:46:29', '2018-07-24 13:47:30'),
(19, '660694101', '14100018', '490541886', '<p>Sebutkan tentang media penyimpan data eksternal computer.?</p>', '<p>nsajdk cajsbcnjkads</p>', '2', '20', 20, '2018-07-24 13:46:29', '2018-07-24 13:47:30'),
(20, '629840708', '14100001', '17', '<p>perteanyaan 1</p>', '<p>pertanyan 1</p>', '2', '30', 20, '2018-08-05 05:19:45', '2018-08-05 05:25:40'),
(21, '629840708', '14100001', '18', '<p>pertanyan 2</p>', '<p>pertanyaan 2</p>', '2', '40', 30, '2018-08-05 05:19:45', '2018-08-05 05:25:40'),
(22, '629840708', '14100001', '19', '<p>pertanyaan 3</p>', '<p>pertanyaan 3</p>', '2', '30', 10, '2018-08-05 05:19:45', '2018-08-05 05:25:40'),
(23, '147999029', '14100001', '20', '<p>ini adalah pertanyaan 1</p>', '<p>pertanyaan 1</p>', '2', '50', 30, '2018-08-05 05:20:11', '2018-08-05 06:03:47'),
(24, '147999029', '14100001', '21', '<p>ini adalah pertanyaan 2</p>', '<p>pertanyaan 2</p>', '2', '50', 44, '2018-08-05 05:20:11', '2018-08-05 06:03:47'),
(25, '520423721', '14100001', '22', '<p>ini adalah pertanyaan 3</p>', '<p>pertanyaan 3</p>', '2', '50', 50, '2018-08-05 05:20:32', '2018-08-05 06:04:26'),
(26, '520423721', '14100001', '23', '<p>ini adalah pertanyaan 4</p>', '<p>pertanyaan 4</p>', '2', '50', 40, '2018-08-05 05:20:32', '2018-08-05 06:04:26'),
(27, '629840708', '14100010', '17', '<p>perteanyaan 1</p>', '<p>pertanyaan 1</p>', '2', '30', 10, '2018-08-05 05:22:39', '2018-08-05 05:26:21'),
(28, '629840708', '14100010', '18', '<p>pertanyan 2</p>', '<p>pertanyaan 2</p>', '2', '40', 25, '2018-08-05 05:22:39', '2018-08-05 05:26:21'),
(29, '629840708', '14100010', '19', '<p>pertanyaan 3</p>', '<p>pertanyaan 3</p>', '2', '30', 22, '2018-08-05 05:22:39', '2018-08-05 05:26:21'),
(30, '147999029', '14100010', '20', '<p>ini adalah pertanyaan 1</p>', '<p>pertanyaan 1</p>', '2', '50', 20, '2018-08-05 05:23:00', '2018-08-05 06:16:17'),
(31, '147999029', '14100010', '21', '<p>ini adalah pertanyaan 2</p>', '<p>pertanyaan 2</p>', '2', '50', 70, '2018-08-05 05:23:00', '2018-08-05 06:16:17'),
(32, '520423721', '14100010', '22', '<p>ini adalah pertanyaan 3</p>', '<p>pertanyaan 3</p>', '2', '50', 22, '2018-08-05 05:23:24', '2018-08-05 06:27:40'),
(33, '520423721', '14100010', '23', '<p>ini adalah pertanyaan 4</p>', '<p>pertanyaan 4</p>', '2', '50', 44, '2018-08-05 05:23:25', '2018-08-05 06:27:40'),
(34, '629840708', '14100018', '17', '<p>perteanyaan 1</p>', '<p>pertanyaan</p>', '2', '30', 20, '2018-08-05 06:29:26', '2018-08-05 06:31:47'),
(35, '629840708', '14100018', '18', '<p>pertanyan 2</p>', '<p>pertanyaan</p>', '2', '40', 40, '2018-08-05 06:29:26', '2018-08-05 06:31:47'),
(36, '629840708', '14100018', '19', '<p>pertanyaan 3</p>', '<p>petanyaan</p>', '2', '30', 25, '2018-08-05 06:29:26', '2018-08-05 06:31:47'),
(37, '147999029', '14100018', '20', '<p>ini adalah pertanyaan 1</p>', '<p>pertanyaan 1</p>', '2', '50', 44, '2018-08-05 06:29:50', '2018-08-05 06:32:25'),
(38, '147999029', '14100018', '21', '<p>ini adalah pertanyaan 2</p>', '<p>pertanyaan 12</p>', '2', '50', 33, '2018-08-05 06:29:50', '2018-08-05 06:32:25'),
(39, '520423721', '14100018', '22', '<p>ini adalah pertanyaan 3</p>', '<p>pertanyaan 3</p>', '2', '50', 12, '2018-08-05 06:30:11', '2018-08-05 06:32:44'),
(40, '520423721', '14100018', '23', '<p>ini adalah pertanyaan 4</p>', '<p>pertanyaan 4</p>', '2', '50', 50, '2018-08-05 06:30:11', '2018-08-05 06:32:44'),
(41, '726263805', '14100001', '24', '<p>satu</p>', '<p>satu</p>', '1', '100', 80, '2018-08-05 07:25:53', '2018-08-05 07:26:40'),
(42, '274906472', '14100001', '25', '<p>satu</p>', '<p>satu</p>', '2', '100', 45, '2018-08-05 07:31:02', '2018-08-05 07:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `judul_kuis`
--

CREATE TABLE `judul_kuis` (
  `id_kuis` int(10) UNSIGNED NOT NULL,
  `id_group` int(11) UNSIGNED NOT NULL,
  `noinduk` int(11) UNSIGNED NOT NULL,
  `id_pertemuan` int(10) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pertemuan` int(11) UNSIGNED NOT NULL,
  `jam` int(11) UNSIGNED NOT NULL,
  `menit` int(11) UNSIGNED NOT NULL,
  `jml_soal` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `judul_kuis`
--

INSERT INTO `judul_kuis` (`id_kuis`, `id_group`, `noinduk`, `id_pertemuan`, `judul`, `waktu`, `pertemuan`, `jam`, `menit`, `jml_soal`, `created_at`, `updated_at`) VALUES
(28150256, 168534129, 1005108502, 0, 'kuis 1', '30', 1, 0, 30, 5, '2018-07-23 16:18:55', '2018-07-24 02:29:04'),
(147999029, 738858803, 1005108502, 66, 'kuis 4', '90', 2, 1, 30, 2, '2018-08-05 05:02:28', '2018-08-05 05:12:20'),
(274906472, 738858803, 1005108502, 66, 'kuis 6', '30', 2, 0, 30, 1, '2018-08-05 07:28:36', '2018-08-05 07:28:50'),
(404931273, 738858803, 1005108502, 0, 'kuis 1', '30', 1, 0, 30, 5, '2018-07-24 02:30:34', '2018-07-24 02:32:00'),
(490541869, 200466436, 1008036601, 0, 'kuis 1', '60', 1, 1, 0, 3, '2018-07-13 14:03:37', '2018-07-13 14:22:33'),
(520423721, 738858803, 1005108502, 66, 'kuis 5', '120', 2, 2, 0, 2, '2018-08-05 05:02:59', '2018-08-05 05:13:10'),
(629840708, 738858803, 1005108502, 66, 'kuis 3', '60', 2, 1, 0, 3, '2018-08-05 04:59:16', '2018-08-05 05:00:04'),
(634057925, 271018679, 1008036601, 0, 'kuis 1', '90', 1, 1, 30, 0, '2018-07-11 14:40:50', '2018-07-11 14:40:50'),
(660694101, 738858803, 1005108502, 0, 'kuis 2', '30', 2, 0, 30, 4, '2018-07-24 13:24:22', '2018-07-24 13:27:08'),
(726263805, 854478368, 1005108502, 97, 'kuis 1', '30', 1, 0, 30, 1, '2018-08-05 07:18:23', '2018-08-05 07:18:33');

-- --------------------------------------------------------

--
-- Table structure for table `kuis`
--

CREATE TABLE `kuis` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_kuis` int(11) UNSIGNED NOT NULL,
  `id_group` int(11) NOT NULL,
  `noinduk` int(11) NOT NULL,
  `pertemuan` int(11) NOT NULL,
  `soal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kuis`
--

INSERT INTO `kuis` (`id`, `id_kuis`, `id_group`, `noinduk`, `pertemuan`, `soal`, `bobot`, `created_at`, `updated_at`) VALUES
(1, 490541869, 200466436, 1008036601, 1, '<p>hkjlhjkxcsd</p>', '30', '2018-07-13 14:20:21', '2018-07-13 14:20:21'),
(2, 490541869, 200466436, 1008036601, 1, '<p>csadcsa</p>', '12', '2018-07-13 14:22:33', '2018-07-13 14:22:33'),
(3, 28150256, 168534129, 1005108502, 1, '<p>Sebutkan &amp; Jelaskan fungsi dari komputer yang sering digunakan manusia ?</p>', '20', '2018-07-24 02:27:50', '2018-07-24 02:27:50'),
(4, 28150256, 168534129, 1005108502, 1, '<p>. Apa sajakah yang termasuk komponen-komponen pada komputer ?</p>', '20', '2018-07-24 02:28:07', '2018-07-24 02:28:07'),
(5, 28150256, 168534129, 1005108502, 1, '<p>Jelaskan cara kerja pada komputer?</p>', '20', '2018-07-24 02:28:26', '2018-07-24 02:28:26'),
(6, 28150256, 168534129, 1005108502, 1, '<p>Sebutkan media apa sajakah yg terdapat pada input, process, maupun output pada cara &nbsp;kerja&nbsp;&nbsp;&nbsp; komputer ?</p>', '20', '2018-07-24 02:28:44', '2018-07-24 02:28:44'),
(7, 28150256, 168534129, 1005108502, 1, '<p>Sebutkan dan jelaskan contoh Komputer mobile?</p>', '20', '2018-07-24 02:29:03', '2018-07-24 02:29:03'),
(8, 404931273, 738858803, 1005108502, 1, '<p>Sebutkan &amp; Jelaskan fungsi dari komputer yang sering digunakan manusia ?</p>', '20', '2018-07-24 02:30:53', '2018-07-24 02:30:53'),
(9, 404931273, 738858803, 1005108502, 1, '<p>Apa sajakah yang termasuk komponen-komponen pada komputer ?</p>', '20', '2018-07-24 02:31:14', '2018-07-24 02:31:14'),
(10, 404931273, 738858803, 1005108502, 1, '<p>Jelaskan cara kerja pada komputer?</p>', '20', '2018-07-24 02:31:29', '2018-07-24 02:31:29'),
(11, 404931273, 738858803, 1005108502, 1, '<p>Sebutkan media apa sajakah yg terdapat pada input, process, maupun output pada cara &nbsp;kerja&nbsp;&nbsp;&nbsp; komputer ?</p>', '20', '2018-07-24 02:31:42', '2018-07-24 02:31:42'),
(12, 404931273, 738858803, 1005108502, 1, '<p>Sebutkan dan jelaskan contoh Komputer mobile?</p>', '20', '2018-07-24 02:32:00', '2018-07-24 02:32:00'),
(13, 660694101, 738858803, 1005108502, 2, '<p>Apakah yang dimaksud dengan <em>Stored Program Computer</em>?</p>', '20', '2018-07-24 13:26:04', '2018-07-24 13:26:04'),
(14, 660694101, 738858803, 1005108502, 2, '<p>Pada level sirkuit yang terintegrasi, apakah 3 bagian yang penting dari sistem computer dan jelaskan?</p>', '30', '2018-07-24 13:26:27', '2018-07-24 13:26:27'),
(15, 660694101, 738858803, 1005108502, 2, '<p>Apakah manfaat menggunakan arsitektur multiple-bus dibandingkan dengan arsitektur <em>single-</em><em>bus</em>?</p>', '30', '2018-07-24 13:26:50', '2018-07-24 13:26:50'),
(16, 660694101, 738858803, 1005108502, 2, '<p>Sebutkan tentang media penyimpan data eksternal computer.?</p>', '20', '2018-07-24 13:27:08', '2018-07-24 13:27:08'),
(17, 629840708, 738858803, 1005108502, 2, '<p>perteanyaan 1</p>', '30', '2018-08-05 04:59:35', '2018-08-05 04:59:35'),
(18, 629840708, 738858803, 1005108502, 2, '<p>pertanyan 2</p>', '40', '2018-08-05 04:59:49', '2018-08-05 04:59:49'),
(19, 629840708, 738858803, 1005108502, 2, '<p>pertanyaan 3</p>', '30', '2018-08-05 05:00:04', '2018-08-05 05:00:04'),
(20, 147999029, 738858803, 1005108502, 2, '<p>ini adalah pertanyaan 1</p>', '50', '2018-08-05 05:12:07', '2018-08-05 05:12:07'),
(21, 147999029, 738858803, 1005108502, 2, '<p>ini adalah pertanyaan 2</p>', '50', '2018-08-05 05:12:20', '2018-08-05 05:12:20'),
(22, 520423721, 738858803, 1005108502, 2, '<p>ini adalah pertanyaan 3</p>', '50', '2018-08-05 05:12:58', '2018-08-05 05:12:58'),
(23, 520423721, 738858803, 1005108502, 2, '<p>ini adalah pertanyaan 4</p>', '50', '2018-08-05 05:13:10', '2018-08-05 05:13:10'),
(24, 726263805, 854478368, 1005108502, 1, '<p>satu</p>', '100', '2018-08-05 07:18:33', '2018-08-05 07:18:33'),
(25, 274906472, 738858803, 1005108502, 2, '<p>satu</p>', '100', '2018-08-05 07:28:49', '2018-08-05 07:28:49');

-- --------------------------------------------------------

--
-- Table structure for table `materis`
--

CREATE TABLE `materis` (
  `id_materi` int(10) UNSIGNED NOT NULL,
  `id_group` int(11) UNSIGNED NOT NULL,
  `noinduk` int(11) UNSIGNED NOT NULL,
  `id_pertemuan` int(11) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pertemuan` int(11) UNSIGNED NOT NULL,
  `coding` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materis`
--

INSERT INTO `materis` (`id_materi`, `id_group`, `noinduk`, `id_pertemuan`, `judul`, `deskripsi`, `upload`, `pertemuan`, `coding`, `status`, `created_at`, `updated_at`) VALUES
(1, 271018679, 1008036601, 0, 'bjkk', 'uhi jnkl jl', '20180711213558.png', 1, '0', '0', '2018-07-11 14:35:58', '2018-07-11 14:35:58'),
(2, 200466436, 1008036601, 0, 'materi file', 'indk ado', '20180713205811.pdf', 1, '0', '0', '2018-07-13 13:58:11', '2018-07-13 13:58:11'),
(3, 200466436, 1008036601, 0, 'video tutorial', 'video', '20180713210138.mp4', 1, '0', '1', '2018-07-13 14:01:38', '2018-07-13 14:01:38'),
(4, 200466436, 1008036601, 0, 'Coding', 'ini adalah coding', '0', 1, '<div class="container">\r\n    <div class="row">\r\n        <div class="col-md-8 col-md-offset-2">\r\n            <div class="panel panel-default">\r\n                <div class="panel-heading">Dashboard</div>\r\n\r\n                <div class="panel-body">\r\n                    You are logged in!\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</div>', '2', '2018-07-13 14:02:36', '2018-07-13 14:02:36'),
(5, 388860090, 1005108502, 0, 'Membuat halaman Berita.php', 'Halaman Administrator dibuat setelah kita berhasil membuat akun login.  Kegunaan halaman administrator ini adalah untuk mengelola semua konten / isi dari halaman depan sebuah website. Cek login, koneksi, dan semua halaman yang berhubungan tetap seperti yang ada pada latihan 1', '0', 1, '<h2>Tambah Berita</h2>\r\n<form method=POST action=''aksiberita.php'' enctype=''multipart/form-data''>\r\n<table>\r\n<tr><td width=100>Judul Berita</td><td> : <input type=text name=''formjudul'' size=60></td></tr>\r\n		<tr><td width=100>Kategori Berita</td><td> : <input type=text name=''formkategori'' size=5></td></tr>\r\n<tr><td>Isi Berita</td><td><textarea name=''formisi'' style=''width: 450px; height: 350px;''></textarea></td></tr>\r\n<tr><td>Gambar</td><td> : <input type=file name=''formgambar'' size=40>\r\n<br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 200 px</td></tr>\r\n</td></tr>\r\n<tr><td colspan=2><input type=submit value=Simpan>\r\n<input type=button value=Batal onclick=self.history.back()></td></tr>\r\n</table></form>";', '2', '2018-07-23 15:14:36', '2018-07-23 15:14:36'),
(6, 738858803, 1005108502, 0, 'BUS', 'Bus Prosesor adalah bus yang diidentifikasikan oleh sinyal pada sinyal chip prosesor tersebut. Perangkat yang memerlukan koneksi dengan cepat dengan kecepatan sangat tinggi ke prosesor, seperti main memory dapat dihubungkan langsung ke bus ini. Motherboar', '20180723233816.docx', 1, '0', '0', '2018-07-23 16:38:16', '2018-07-23 16:38:16'),
(7, 738858803, 1005108502, 0, 'tutorial', 'tutorial', '20180724093349.mp4', 1, '0', '1', '2018-07-24 02:33:50', '2018-07-24 02:33:50'),
(8, 738858803, 1005108502, 66, 'matri file', 'ini adalah materi file', '20180805120736.docx', 2, '0', '0', '2018-08-05 05:07:36', '2018-08-05 05:07:36'),
(9, 738858803, 1005108502, 66, 'materi video', 'ini adalah materi video', '20180805121113.mp4', 2, '0', '1', '2018-08-05 05:11:13', '2018-08-05 05:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2018_06_12_124636_create_periode_table', 1),
(6, '2018_06_12_143724_create_cek_mahasiswa_table', 1),
(7, '2018_06_12_145800_create_cek_dosen_table', 1),
(8, '2018_06_12_151701_create_berita_table', 1),
(9, '2018_06_14_081400_create_foto_table', 1),
(10, '2018_06_23_051059_create_biodata_table', 1),
(11, '2018_06_23_135154_create_group_table', 1),
(12, '2018_06_23_135828_create_pertemuan_table', 1),
(13, '2018_06_24_073450_create_kuis_table', 1),
(14, '2018_06_24_074213_create_materi_table', 1),
(15, '2018_06_25_090249_create_judul_kuis_table', 1),
(16, '2018_06_27_123018_create_gabung_group_table', 1),
(17, '2018_06_28_100156_create_mulai_ujian_table', 1),
(18, '2018_06_29_205316_create_jawaban_table', 1),
(19, '2018_06_29_232959_create_absen_table', 1),
(20, '2018_06_30_124022_create_nilai_table', 1),
(21, '2018_07_07_215647_create_ambil_absen_table', 1),
(23, '2018_07_11_194629_create_cobas_table', 2),
(24, '2018_07_16_193529_create_postings_table', 3),
(25, '2018_07_16_215632_create_tugas_table', 4),
(26, '2018_07_17_192944_create_homepesans_table', 5),
(27, '2018_07_17_193417_create_pesans_table', 5),
(28, '2018_07_24_205729_create_requests_table', 6),
(29, '2018_07_24_205729_create_reques_table', 7),
(30, '2018_08_05_124511_create_all_nilais_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `mulai_ujians`
--

CREATE TABLE `mulai_ujians` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kuis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noinduk` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pertemuan` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mulai_ujians`
--

INSERT INTO `mulai_ujians` (`id`, `id_group`, `id_kuis`, `noinduk`, `pertemuan`, `waktu`, `created_at`, `updated_at`) VALUES
(1, '200466436', '490541869', '14100018', '1', '24:37:00', '2018-07-13 16:37:36', '2018-07-13 16:37:36'),
(2, '738858803', '404931273', '14100001', '1', '12:73:00', '2018-07-24 05:43:54', '2018-07-24 05:43:54'),
(3, '738858803', '660694101', '14100010', '2', '20:58:00', '2018-07-24 13:28:20', '2018-07-24 13:28:20'),
(4, '738858803', '660694101', '14100001', '2', '20:68:00', '2018-07-24 13:38:20', '2018-07-24 13:38:20'),
(5, '738858803', '660694101', '14100018', '2', '20:76:00', '2018-07-24 13:46:05', '2018-07-24 13:46:05'),
(6, '738858803', '629840708', '14100001', '2', '13:19:00', '2018-08-05 05:19:19', '2018-08-05 05:19:19'),
(7, '738858803', '147999029', '14100001', '2', '13:49:00', '2018-08-05 05:19:52', '2018-08-05 05:19:52'),
(8, '738858803', '520423721', '14100001', '2', '14:20:00', '2018-08-05 05:20:17', '2018-08-05 05:20:17'),
(9, '738858803', '629840708', '14100010', '2', '13:22:00', '2018-08-05 05:22:18', '2018-08-05 05:22:18'),
(10, '738858803', '147999029', '14100010', '2', '13:52:00', '2018-08-05 05:22:45', '2018-08-05 05:22:45'),
(11, '738858803', '520423721', '14100010', '2', '14:23:00', '2018-08-05 05:23:07', '2018-08-05 05:23:07'),
(12, '738858803', '629840708', '14100018', '2', '14:29:00', '2018-08-05 06:29:05', '2018-08-05 06:29:05'),
(13, '738858803', '147999029', '14100018', '2', '14:59:00', '2018-08-05 06:29:32', '2018-08-05 06:29:32'),
(14, '738858803', '520423721', '14100018', '2', '15:29:00', '2018-08-05 06:29:55', '2018-08-05 06:29:55'),
(15, '854478368', '726263805', '14100001', '1', '14:55:00', '2018-08-05 07:25:42', '2018-08-05 07:25:42'),
(16, '738858803', '274906472', '14100001', '2', '14:60:00', '2018-08-05 07:30:54', '2018-08-05 07:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `nilais`
--

CREATE TABLE `nilais` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_group` int(11) UNSIGNED NOT NULL,
  `id_kuis` int(11) UNSIGNED NOT NULL,
  `noinduk` int(11) UNSIGNED NOT NULL,
  `nilai` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilais`
--

INSERT INTO `nilais` (`id`, `id_group`, `id_kuis`, `noinduk`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 200466436, 490541869, 14100018, 42, '2018-07-14 08:26:36', '2018-07-14 08:26:36'),
(2, 738858803, 404931273, 14100001, 65, '2018-07-24 05:56:10', '2018-07-24 05:56:10'),
(3, 738858803, 660694101, 14100010, 70, '2018-07-24 13:30:14', '2018-07-24 13:30:14'),
(4, 738858803, 660694101, 14100001, 80, '2018-07-24 13:40:47', '2018-07-24 13:40:47'),
(5, 738858803, 660694101, 14100018, 80, '2018-07-24 13:47:33', '2018-07-24 13:47:33'),
(6, 738858803, 629840708, 14100001, 60, '2018-08-05 05:25:42', '2018-08-05 05:25:42'),
(7, 738858803, 629840708, 14100010, 57, '2018-08-05 05:26:26', '2018-08-05 05:26:26'),
(8, 738858803, 147999029, 14100001, 74, '2018-08-05 06:03:50', '2018-08-05 06:03:50'),
(10, 738858803, 520423721, 14100001, 90, '2018-08-05 06:05:29', '2018-08-05 06:05:29'),
(11, 738858803, 147999029, 14100010, 90, '2018-08-05 06:16:19', '2018-08-05 06:16:19'),
(12, 738858803, 520423721, 14100010, 66, '2018-08-05 06:27:43', '2018-08-05 06:27:43'),
(13, 738858803, 629840708, 14100018, 85, '2018-08-05 06:31:49', '2018-08-05 06:31:49'),
(14, 738858803, 147999029, 14100018, 77, '2018-08-05 06:32:28', '2018-08-05 06:32:28'),
(15, 738858803, 520423721, 14100018, 62, '2018-08-05 06:32:47', '2018-08-05 06:32:47'),
(17, 738858803, 274906472, 14100001, 45, '2018-08-05 07:34:15', '2018-08-05 07:34:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `periodes`
--

CREATE TABLE `periodes` (
  `id` int(10) UNSIGNED NOT NULL,
  `periode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pertemuans`
--

CREATE TABLE `pertemuans` (
  `id_pertemuan` int(11) UNSIGNED NOT NULL,
  `id_group` int(11) UNSIGNED NOT NULL,
  `noinduk` int(11) UNSIGNED NOT NULL,
  `pertemuan` int(11) UNSIGNED NOT NULL,
  `status` int(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pertemuans`
--

INSERT INTO `pertemuans` (`id_pertemuan`, `id_group`, `noinduk`, `pertemuan`, `status`, `created_at`, `updated_at`) VALUES
(33, 200466436, 1008036601, 1, 1, '2018-07-13 13:53:02', '2018-07-13 13:53:56'),
(34, 200466436, 1008036601, 2, 1, '2018-07-13 13:53:02', '2018-07-22 15:41:04'),
(35, 200466436, 1008036601, 3, 0, '2018-07-13 13:53:02', '2018-07-13 13:53:02'),
(36, 200466436, 1008036601, 4, 0, '2018-07-13 13:53:02', '2018-07-13 13:53:02'),
(37, 200466436, 1008036601, 5, 0, '2018-07-13 13:53:02', '2018-07-13 13:53:02'),
(38, 200466436, 1008036601, 6, 0, '2018-07-13 13:53:02', '2018-07-13 13:53:02'),
(39, 200466436, 1008036601, 7, 0, '2018-07-13 13:53:02', '2018-07-13 13:53:02'),
(40, 200466436, 1008036601, 8, 0, '2018-07-13 13:53:02', '2018-07-13 13:53:02'),
(41, 200466436, 1008036601, 9, 0, '2018-07-13 13:53:03', '2018-07-13 13:53:03'),
(42, 200466436, 1008036601, 10, 0, '2018-07-13 13:53:03', '2018-07-13 13:53:03'),
(43, 200466436, 1008036601, 11, 0, '2018-07-13 13:53:03', '2018-07-13 13:53:03'),
(44, 200466436, 1008036601, 12, 0, '2018-07-13 13:53:03', '2018-07-13 13:53:03'),
(45, 200466436, 1008036601, 13, 0, '2018-07-13 13:53:03', '2018-07-13 13:53:03'),
(46, 200466436, 1008036601, 14, 0, '2018-07-13 13:53:03', '2018-07-13 13:53:03'),
(47, 200466436, 1008036601, 15, 0, '2018-07-13 13:53:03', '2018-07-13 13:53:03'),
(48, 200466436, 1008036601, 16, 0, '2018-07-13 13:53:03', '2018-07-13 13:53:03'),
(49, 388860090, 1005108502, 1, 1, '2018-07-23 15:10:51', '2018-07-23 15:11:15'),
(50, 388860090, 1005108502, 2, 0, '2018-07-23 15:10:51', '2018-07-23 15:10:51'),
(51, 388860090, 1005108502, 3, 0, '2018-07-23 15:10:51', '2018-07-23 15:10:51'),
(52, 388860090, 1005108502, 4, 0, '2018-07-23 15:10:51', '2018-07-23 15:10:51'),
(53, 388860090, 1005108502, 5, 0, '2018-07-23 15:10:51', '2018-07-23 15:10:51'),
(54, 388860090, 1005108502, 6, 0, '2018-07-23 15:10:51', '2018-07-23 15:10:51'),
(55, 388860090, 1005108502, 7, 0, '2018-07-23 15:10:51', '2018-07-23 15:10:51'),
(56, 388860090, 1005108502, 8, 0, '2018-07-23 15:10:51', '2018-07-23 15:10:51'),
(57, 388860090, 1005108502, 9, 0, '2018-07-23 15:10:51', '2018-07-23 15:10:51'),
(58, 388860090, 1005108502, 10, 0, '2018-07-23 15:10:51', '2018-07-23 15:10:51'),
(59, 388860090, 1005108502, 11, 0, '2018-07-23 15:10:51', '2018-07-23 15:10:51'),
(60, 388860090, 1005108502, 12, 0, '2018-07-23 15:10:51', '2018-07-23 15:10:51'),
(61, 388860090, 1005108502, 13, 0, '2018-07-23 15:10:51', '2018-07-23 15:10:51'),
(62, 388860090, 1005108502, 14, 0, '2018-07-23 15:10:51', '2018-07-23 15:10:51'),
(63, 388860090, 1005108502, 15, 0, '2018-07-23 15:10:51', '2018-07-23 15:10:51'),
(64, 388860090, 1005108502, 16, 0, '2018-07-23 15:10:51', '2018-07-23 15:10:51'),
(65, 738858803, 1005108502, 1, 1, '2018-07-23 16:00:11', '2018-07-23 16:36:55'),
(66, 738858803, 1005108502, 2, 1, '2018-07-23 16:00:11', '2018-07-24 04:04:00'),
(67, 738858803, 1005108502, 3, 0, '2018-07-23 16:00:11', '2018-07-23 16:00:11'),
(68, 738858803, 1005108502, 4, 0, '2018-07-23 16:00:11', '2018-07-23 16:00:11'),
(69, 738858803, 1005108502, 5, 0, '2018-07-23 16:00:11', '2018-07-23 16:00:11'),
(70, 738858803, 1005108502, 6, 0, '2018-07-23 16:00:11', '2018-07-23 16:00:11'),
(71, 738858803, 1005108502, 7, 0, '2018-07-23 16:00:11', '2018-07-23 16:00:11'),
(72, 738858803, 1005108502, 8, 0, '2018-07-23 16:00:11', '2018-07-23 16:00:11'),
(73, 738858803, 1005108502, 9, 0, '2018-07-23 16:00:11', '2018-07-23 16:00:11'),
(74, 738858803, 1005108502, 10, 0, '2018-07-23 16:00:11', '2018-07-23 16:00:11'),
(75, 738858803, 1005108502, 11, 0, '2018-07-23 16:00:12', '2018-07-23 16:00:12'),
(76, 738858803, 1005108502, 12, 0, '2018-07-23 16:00:12', '2018-07-23 16:00:12'),
(77, 738858803, 1005108502, 13, 0, '2018-07-23 16:00:12', '2018-07-23 16:00:12'),
(78, 738858803, 1005108502, 14, 0, '2018-07-23 16:00:12', '2018-07-23 16:00:12'),
(79, 738858803, 1005108502, 15, 0, '2018-07-23 16:00:12', '2018-07-23 16:00:12'),
(80, 738858803, 1005108502, 16, 0, '2018-07-23 16:00:12', '2018-07-23 16:00:12'),
(81, 168534129, 1005108502, 1, 1, '2018-07-23 16:16:08', '2018-07-23 16:16:22'),
(82, 168534129, 1005108502, 2, 0, '2018-07-23 16:16:08', '2018-07-23 16:16:08'),
(83, 168534129, 1005108502, 3, 0, '2018-07-23 16:16:08', '2018-07-23 16:16:08'),
(84, 168534129, 1005108502, 4, 0, '2018-07-23 16:16:08', '2018-07-23 16:16:08'),
(85, 168534129, 1005108502, 5, 0, '2018-07-23 16:16:08', '2018-07-23 16:16:08'),
(86, 168534129, 1005108502, 6, 0, '2018-07-23 16:16:08', '2018-07-23 16:16:08'),
(87, 168534129, 1005108502, 7, 0, '2018-07-23 16:16:08', '2018-07-23 16:16:08'),
(88, 168534129, 1005108502, 8, 0, '2018-07-23 16:16:08', '2018-07-23 16:16:08'),
(89, 168534129, 1005108502, 9, 0, '2018-07-23 16:16:08', '2018-07-23 16:16:08'),
(90, 168534129, 1005108502, 10, 0, '2018-07-23 16:16:08', '2018-07-23 16:16:08'),
(91, 168534129, 1005108502, 11, 0, '2018-07-23 16:16:08', '2018-07-23 16:16:08'),
(92, 168534129, 1005108502, 12, 0, '2018-07-23 16:16:08', '2018-07-23 16:16:08'),
(93, 168534129, 1005108502, 13, 0, '2018-07-23 16:16:08', '2018-07-23 16:16:08'),
(94, 168534129, 1005108502, 14, 0, '2018-07-23 16:16:08', '2018-07-23 16:16:08'),
(95, 168534129, 1005108502, 15, 0, '2018-07-23 16:16:08', '2018-07-23 16:16:08'),
(96, 168534129, 1005108502, 16, 0, '2018-07-23 16:16:08', '2018-07-23 16:16:08'),
(97, 854478368, 1005108502, 1, 1, '2018-08-05 06:56:10', '2018-08-05 07:18:10'),
(98, 854478368, 1005108502, 2, 0, '2018-08-05 06:56:19', '2018-08-05 06:56:19'),
(99, 854478368, 1005108502, 3, 0, '2018-08-05 06:56:19', '2018-08-05 06:56:19'),
(100, 854478368, 1005108502, 4, 0, '2018-08-05 06:56:19', '2018-08-05 06:56:19'),
(101, 854478368, 1005108502, 5, 0, '2018-08-05 06:56:19', '2018-08-05 06:56:19'),
(102, 854478368, 1005108502, 6, 0, '2018-08-05 06:56:19', '2018-08-05 06:56:19'),
(103, 854478368, 1005108502, 7, 0, '2018-08-05 06:56:19', '2018-08-05 06:56:19'),
(104, 854478368, 1005108502, 8, 0, '2018-08-05 06:56:19', '2018-08-05 06:56:19'),
(105, 854478368, 1005108502, 9, 0, '2018-08-05 06:56:19', '2018-08-05 06:56:19'),
(106, 854478368, 1005108502, 10, 0, '2018-08-05 06:56:19', '2018-08-05 06:56:19'),
(107, 854478368, 1005108502, 11, 0, '2018-08-05 06:56:20', '2018-08-05 06:56:20'),
(108, 854478368, 1005108502, 12, 0, '2018-08-05 06:56:20', '2018-08-05 06:56:20'),
(109, 854478368, 1005108502, 13, 0, '2018-08-05 06:56:20', '2018-08-05 06:56:20'),
(110, 854478368, 1005108502, 14, 0, '2018-08-05 06:56:20', '2018-08-05 06:56:20'),
(111, 854478368, 1005108502, 15, 0, '2018-08-05 06:56:20', '2018-08-05 06:56:20'),
(112, 854478368, 1005108502, 16, 0, '2018-08-05 06:56:20', '2018-08-05 06:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `pesans`
--

CREATE TABLE `pesans` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pesan` int(10) UNSIGNED NOT NULL,
  `pengirim` int(10) UNSIGNED NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesans`
--

INSERT INTO `pesans` (`id`, `id_pesan`, `pengirim`, `isi`, `created_at`, `updated_at`) VALUES
(10, 70057487, 1008036601, 'hy', '2018-07-17 14:41:10', '2018-07-17 14:41:10'),
(11, 70057487, 14100018, 'iya', '2018-07-17 15:03:12', '2018-07-17 15:03:12'),
(12, 70057487, 14100018, 'dsac', '2018-07-17 15:09:20', '2018-07-17 15:09:20'),
(13, 70057487, 14100018, 'oke', '2018-07-17 15:24:41', '2018-07-17 15:24:41'),
(14, 70057487, 1008036601, 'baik lah', '2018-07-17 16:02:56', '2018-07-17 16:02:56'),
(15, 70057487, 1008036601, 'cds', '2018-07-17 16:03:05', '2018-07-17 16:03:05'),
(16, 70057487, 1008036601, 'dcas', '2018-07-17 16:03:09', '2018-07-17 16:03:09'),
(17, 70057487, 1008036601, 'dsa', '2018-07-17 16:03:13', '2018-07-17 16:03:13'),
(18, 8667138, 1005108502, 'tes!', '2018-07-24 03:01:37', '2018-07-24 03:01:37'),
(19, 8667138, 14100001, 'test!', '2018-07-25 15:35:22', '2018-07-25 15:35:22'),
(20, 8667138, 1005108502, 'test!', '2018-08-01 08:06:24', '2018-08-01 08:06:24');

-- --------------------------------------------------------

--
-- Table structure for table `postings`
--

CREATE TABLE `postings` (
  `id` int(10) UNSIGNED NOT NULL,
  `noinduk` int(10) UNSIGNED NOT NULL,
  `id_group` int(11) NOT NULL,
  `isi_posting` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `postings`
--

INSERT INTO `postings` (`id`, `noinduk`, `id_group`, `isi_posting`, `created_at`, `updated_at`) VALUES
(2, 14100018, 200466436, 'saya pendatang baru', '2018-07-16 12:53:26', '2018-07-16 12:53:26'),
(3, 1008036601, 200466436, 'selamat malam', '2018-07-16 13:21:25', '2018-07-16 13:21:25'),
(4, 14100001, 738858803, 'test!', '2018-07-24 02:41:40', '2018-07-24 02:41:40');

-- --------------------------------------------------------

--
-- Table structure for table `reques`
--

CREATE TABLE `reques` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_group` int(10) UNSIGNED NOT NULL,
  `noinduk` int(10) UNSIGNED NOT NULL,
  `pertemuan` int(10) UNSIGNED NOT NULL,
  `upload` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `id_group`, `noinduk`, `pertemuan`, `upload`, `created_at`, `updated_at`) VALUES
(2, 200466436, 14100018, 1, '14100018-20180716222508.png', '2018-07-16 15:25:08', '2018-07-16 15:25:08'),
(3, 738858803, 14100001, 2, '14100001-20180724203900.pdf', '2018-07-24 13:39:00', '2018-07-24 13:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `noinduk` int(11) NOT NULL,
  `nama_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`noinduk`, `nama_user`, `level`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(789123, 'ADMIN', 'admin', '$2y$10$0NLXowmSmVVjmjYhDtAnIuIeP0LGaU7x/y.M55ZQ79.J8Dejg60I2', 'yoLb5orfR8m6SshUUyttQdBfoyqK2dtqOtWxnRG9fbVbRqK9u1bKcyG1ylZS', NULL, '2018-07-24 14:55:13'),
(14100001, 'Rahma Yani', 'mahasiswa', '$2y$10$7LYMqIjUVgLFmSXQTP4U5.IUvsYBAmM99ND8dfPLW5AWT3C.XZdV6', 'CXnj6kimYyhRNcik6pDpFXTG2vuocbarP1A1jdh3s2wao9SXCBfJFvvOuQZR', '0000-00-00 00:00:00', '2018-07-24 15:29:15'),
(14100002, 'Mirnawati', 'mahasiswa', '$2y$10$xZn4f//wochcTp6ezN0fZ.9dxO6wp.umW/0IHfkto1N0F4FXlpPA2', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100003, 'Febri Ramadona', 'mahasiswa', '$2y$10$o3PnrgQuoEagADEb7cfGKe0Wl1Zwt6fwClqLwlSpamJKdWLf.uaLe', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100004, 'Jumiati', 'mahasiswa', '$2y$10$q5gbFdogyPE3fxpBTKpB4OLgzDGLmq6kJIVHXIYM4CLaH0PW4JM/O', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100005, 'Desi Ariani', 'mahasiswa', '$2y$10$FWW.ZuR2PyweHEldAfXYKu78s06SMFz.bNSbHrXth9faJaohPzAO2', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100006, 'Syafrila Haris', 'mahasiswa', '$2y$10$nJ9HHs.WA6Z0S6m/9KvZp.6T8ijr7.iA1ywwqN24xfCOCmb6lu/lC', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100007, 'Renni Febrina', 'mahasiswa', '$2y$10$qzrkJSt0/tRv0c3L4gy/2uZ1yQsUg9ZLQzB4zY4d7l42M6dkYs5Ay', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100008, 'Trimay Anggreini', 'mahasiswa', '$2y$10$yvyWYiT/ta3Cx5LX5Qk7aOpIYe4MxgDmMfDOM0sdNOQxCTcap/KG2', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100009, 'Herisva Hendra', 'mahasiswa', '$2y$10$0NLXowmSmVVjmjYhDtAnIuIeP0LGaU7x/y.M55ZQ79.J8Dejg60I2', '6Vf2Ai2TIU1GG3Q4BYjWGsjtLWME4sD67hOOysCAYFfFX9RwpG7fF8YOhwm9', NULL, NULL),
(14100010, 'Putri Andam Dewi', 'mahasiswa', '$2y$10$347uqvYhDbrOypBm9W8ez.fYI5A/aCopjRNF7olCVrQjx6VCNm4qm', 'n4DZjVcgdNfuwnMA4Bc19vRkIOvV9Hnzo50nQBxvxm8AqLq54EicLxmUX6K5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100011, 'Riyan Kurnia', 'mahasiswa', '$2y$10$jYR9WONcB2uhQnB/ONmfjeU.sm2aCztVMdvaR2AO16tHT8eN1PJ1u', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100012, 'Desma Yulita', 'mahasiswa', '$2y$10$0NLXowmSmVVjmjYhDtAnIuIeP0LGaU7x/y.M55ZQ79.J8Dejg60I2', NULL, NULL, NULL),
(14100013, 'Novriadi', 'mahasiswa', '$2y$10$0NLXowmSmVVjmjYhDtAnIuIeP0LGaU7x/y.M55ZQ79.J8Dejg60I2', '6rbdSSyebL9nJwWoh6RuQ2ZYIAgoKPZr8vnpeBA97br0aHwZ2Qefv3CmuLZM', NULL, NULL),
(14100014, 'Gusdianto Ade Putra', 'mahasiswa', '$2y$10$0NLXowmSmVVjmjYhDtAnIuIeP0LGaU7x/y.M55ZQ79.J8Dejg60I2', NULL, NULL, NULL),
(14100015, 'Yulia Putri', 'mahasiswa', '$2y$10$0NLXowmSmVVjmjYhDtAnIuIeP0LGaU7x/y.M55ZQ79.J8Dejg60I2', NULL, NULL, NULL),
(14100016, 'Silvia Yulanda', 'mahasiswa', '$2y$10$0NLXowmSmVVjmjYhDtAnIuIeP0LGaU7x/y.M55ZQ79.J8Dejg60I2', NULL, NULL, NULL),
(14100017, 'Jefri Naldi', 'mahasiswa', '$2y$10$0NLXowmSmVVjmjYhDtAnIuIeP0LGaU7x/y.M55ZQ79.J8Dejg60I2', 'weQpVYvYh1ZUJn7eZAHal7NIiiydZA5HhlYhnt5hqebKaywSXScS2Bzl1LgJ', NULL, NULL),
(14100018, 'Hotmaruliasi Simanungkalit', 'mahasiswa', '$2y$10$B5.29NP3VaG0DgwzNOS0euE2saw/2nlk.H0b9QDeWWPf6ektalCsq', 'CUDMsC8HLmqiXSr6dhZlsL0Dp9zuWn4wjjc47YPtANplhUPs3qcwLgkIq5rW', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14100019, 'Riki Saputra', 'mahasiswa', '$2y$10$0NLXowmSmVVjmjYhDtAnIuIeP0LGaU7x/y.M55ZQ79.J8Dejg60I2', NULL, NULL, NULL),
(14100020, 'Sherly Handayany', 'mahasiswa', '$2y$10$0NLXowmSmVVjmjYhDtAnIuIeP0LGaU7x/y.M55ZQ79.J8Dejg60I2', NULL, NULL, NULL),
(14100021, 'Reza Oktaliardi', 'mahasiswa', '$2y$10$0NLXowmSmVVjmjYhDtAnIuIeP0LGaU7x/y.M55ZQ79.J8Dejg60I2', NULL, NULL, NULL),
(14100022, 'Asri Yanti', 'mahasiswa', '$2y$10$0NLXowmSmVVjmjYhDtAnIuIeP0LGaU7x/y.M55ZQ79.J8Dejg60I2', NULL, NULL, NULL),
(14100023, 'Nanda Meidiana', 'mahasiswa', '$2y$10$0NLXowmSmVVjmjYhDtAnIuIeP0LGaU7x/y.M55ZQ79.J8Dejg60I2', NULL, NULL, NULL),
(14100024, 'Gita Septiani', 'mahasiswa', '$2y$10$0NLXowmSmVVjmjYhDtAnIuIeP0LGaU7x/y.M55ZQ79.J8Dejg60I2', NULL, NULL, NULL),
(14100025, 'Aldi Partison', 'mahasiswa', '$2y$10$0NLXowmSmVVjmjYhDtAnIuIeP0LGaU7x/y.M55ZQ79.J8Dejg60I2', NULL, NULL, NULL),
(14100026, 'Ulfa Afra Syuhadda', 'mahasiswa', '$2y$10$0NLXowmSmVVjmjYhDtAnIuIeP0LGaU7x/y.M55ZQ79.J8Dejg60I2', NULL, NULL, NULL),
(14100027, 'Maya', 'mahasiswa', '$2y$10$0NLXowmSmVVjmjYhDtAnIuIeP0LGaU7x/y.M55ZQ79.J8Dejg60I2', NULL, NULL, NULL),
(14100028, 'Mutia Ramadhani', 'mahasiswa', '$2y$10$0NLXowmSmVVjmjYhDtAnIuIeP0LGaU7x/y.M55ZQ79.J8Dejg60I2', NULL, NULL, NULL),
(14100029, 'Fajri Rahman', 'mahasiswa', '$2y$10$0NLXowmSmVVjmjYhDtAnIuIeP0LGaU7x/y.M55ZQ79.J8Dejg60I2', NULL, NULL, NULL),
(14100030, 'Ahmad Husaini', 'mahasiswa', '$2y$10$0NLXowmSmVVjmjYhDtAnIuIeP0LGaU7x/y.M55ZQ79.J8Dejg60I2', NULL, NULL, NULL),
(14100031, 'Keni Gusdayanti', 'mahasiswa', '$2y$10$akeNjHEPrJz3SPk0WnDFdunFJpg6xOebzXUUEc0HE8OZyG58v37B2', NULL, '2018-08-05 08:50:46', '2018-08-05 08:50:46'),
(14100033, 'Trisna Mardianti', 'mahasiswa', '$2y$10$ZC93ORiLGNN62L1XtQi7K.sx/Sat5N/S35CJ1WPCCSt1JubW4A6Cq', 'N7ErP2w1trJyvWRepAKnBYpzy0pgccEkE84gRJJfQc2rjdjhRPjkwNHTSKhz', '2018-08-05 08:48:12', '2018-08-05 08:48:12'),
(14100035, 'Trisna Mardianti', 'mahasiswa', '$2y$10$RNjF3BwuBvkc4L2GAivzoOwlb4W7nJNInQ/TjCEziPW2iim7bH4MW', 'pJbOKgEGBL4DaoYLow04KmWKMVeXf2YS4jGZqE1tbFz6kAsE9LSjlH0ZNV8d', '2018-08-05 08:56:39', '2018-08-05 08:56:39'),
(14100044, 'Popy Saputra', 'mahasiswa', '$2y$10$87/oRFX.qeDXxG/0QAXbWej9L9HJToeGgECwRjqGpw5plJUrzpqgq', NULL, '2018-08-05 09:00:25', '2018-08-05 09:00:25'),
(21037201, 'Heri Mulyono, S.Kom, M.Pd', 'dosen', '$2y$10$hgLU1Xd.QXdUOJlU9d25/eWCd8C2jL9xxwtEM9Sjl08SZpGZ/vYKK', NULL, '2018-07-23 15:04:35', '2018-07-23 15:04:35'),
(1005108502, 'Ellbert Hutabri, M. Kom', 'dosen', '$2y$10$bOrq1ItB0t0Owx.rh90iDOINT9/eZ4GMZfwyfZU.Yt1CmJrwfOJXK', 'IAytp2Uhyo2IanGVavw5EFaaPHleqGoZ8pRHYMJKJEIEWkf4nurcIR99Pmsm', '2018-07-23 15:03:15', '2018-07-24 15:31:03'),
(1008036601, 'Ir.Hj.Nurmi,M.Kom', 'dosen', '$2y$10$mWxIVDt78Qc0vnrZd7t9XuiCzRQOQFIREFna/cQTyLQqMQgepmgDu', 'YqGh9F8bUKXD2zosx1s5wVQNHkWNNHtdqb68BtbWy5qE0FMlcfWjdlYaMGbN', NULL, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absens`
--
ALTER TABLE `absens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_nilais`
--
ALTER TABLE `all_nilais`
  ADD PRIMARY KEY (`id_all_nilai`);

--
-- Indexes for table `ambil_absens`
--
ALTER TABLE `ambil_absens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biodatas`
--
ALTER TABLE `biodatas`
  ADD PRIMARY KEY (`noinduk`);

--
-- Indexes for table `cek_dosens`
--
ALTER TABLE `cek_dosens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cek_mahasiswas`
--
ALTER TABLE `cek_mahasiswas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gabung_groups`
--
ALTER TABLE `gabung_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id_group`),
  ADD KEY `noinduk` (`noinduk`);

--
-- Indexes for table `jawabans`
--
ALTER TABLE `jawabans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `judul_kuis`
--
ALTER TABLE `judul_kuis`
  ADD PRIMARY KEY (`id_kuis`),
  ADD KEY `id_pertemuan` (`id_pertemuan`);

--
-- Indexes for table `kuis`
--
ALTER TABLE `kuis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kuis` (`id_kuis`);

--
-- Indexes for table `materis`
--
ALTER TABLE `materis`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `id_pertemuan` (`id_pertemuan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mulai_ujians`
--
ALTER TABLE `mulai_ujians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `noinduk` (`noinduk`),
  ADD KEY `id_kuis` (`id_kuis`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `periodes`
--
ALTER TABLE `periodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pertemuans`
--
ALTER TABLE `pertemuans`
  ADD PRIMARY KEY (`id_pertemuan`),
  ADD KEY `pertemuans_id_group_group_foreign` (`id_group`);

--
-- Indexes for table `pesans`
--
ALTER TABLE `pesans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postings`
--
ALTER TABLE `postings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reques`
--
ALTER TABLE `reques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`noinduk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absens`
--
ALTER TABLE `absens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `all_nilais`
--
ALTER TABLE `all_nilais`
  MODIFY `id_all_nilai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ambil_absens`
--
ALTER TABLE `ambil_absens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `gabung_groups`
--
ALTER TABLE `gabung_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `jawabans`
--
ALTER TABLE `jawabans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `judul_kuis`
--
ALTER TABLE `judul_kuis`
  MODIFY `id_kuis` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=726263806;
--
-- AUTO_INCREMENT for table `kuis`
--
ALTER TABLE `kuis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `materis`
--
ALTER TABLE `materis`
  MODIFY `id_materi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `mulai_ujians`
--
ALTER TABLE `mulai_ujians`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `periodes`
--
ALTER TABLE `periodes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pertemuans`
--
ALTER TABLE `pertemuans`
  MODIFY `id_pertemuan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `pesans`
--
ALTER TABLE `pesans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `postings`
--
ALTER TABLE `postings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reques`
--
ALTER TABLE `reques`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

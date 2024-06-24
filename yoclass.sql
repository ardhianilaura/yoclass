-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2021 at 03:43 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yoclass`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `pnilai` ()  BEGIN
SELECT nama_siswa as Nama, mapel, nilai as Nilai, ket_nilai(nilai) as Keterangan FROM nilai JOIN siswa ON nilai.siswa_id=siswa.siswa_id JOIN mata_pelajaran ON nilai.mapel_id=mata_pelajaran.mapel_id WHERE nilai_id = 2;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `psiswa` (`nis` VARCHAR(50))  BEGIN
SELECT siswa_id as nis, nama_siswa as nama, kelas FROM siswa JOIN kelas ON siswa.kelas_id=kelas.kelas_id WHERE siswa_id = 4;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `fnilai` (`nilai` INT) RETURNS VARCHAR(30) CHARSET utf8mb4 BEGIN
DECLARE ket VARCHAR(30);
IF nilai >= 75 THEN
SET ket = 'LULUS';
ELSEIF nilai < 75 THEN
SET ket = 'TIDAK LULUS';
END IF;
RETURN ket;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `ket_nilai` (`nilai` INT) RETURNS VARCHAR(30) CHARSET utf8mb4 BEGIN
DECLARE ket VARCHAR(30);
IF nilai >= 75 THEN
SET ket = 'LULUS';
ELSEIF nilai < 75 THEN
SET ket = 'TIDAK LULUS';
END IF;
RETURN ket;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `kode_kelas` int(50) NOT NULL,
  `kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`kode_kelas`, `kelas`) VALUES
(1, '10 MIPA-1'),
(2, '10 MIPA-2'),
(3, '10 MIPA-3'),
(4, '10 MIPA-4'),
(5, '10 MIPA-5'),
(6, '10 IPS-1'),
(7, '10 IPS-2'),
(8, '10 IPS-3'),
(9, '10 IPS-4'),
(10, '10 IPS-5'),
(11, '10 BB');

-- --------------------------------------------------------

--
-- Table structure for table `dsiswa`
--

CREATE TABLE `dsiswa` (
  `dsiswa_id` int(11) NOT NULL,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL,
  `aksi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dsiswa`
--

INSERT INTO `dsiswa` (`dsiswa_id`, `nama_siswa`, `nis`, `kota`, `tgl_ubah`, `aksi`) VALUES
(1, 'Na jaemin', '721888', 'Wonogiri', '2020-04-27 08:00:00', 'update'),
(2, 'Huang Xuxi', '723672', 'Cilandak', '2020-04-27 08:14:09', 'tambah'),
(3, 'Lee Jeno', '382771', 'Buah Batu', '2020-04-27 08:23:24', 'delete'),
(4, 'Huang Xuxi', '723672', 'Cilandak', '2020-04-27 09:08:07', 'update'),
(5, 'Park Jisung', '242526', 'Bojongsoang', '2020-04-27 09:49:47', 'update'),
(6, 'Zhong Chenle', '112233', 'Bojongsoang', '2020-04-28 09:57:01', 'update'),
(7, 'Park Jisung', '242526', 'Buah Batu', '2020-04-28 09:57:10', 'update'),
(8, 'Kim Jungwoo', '283763', 'Cikarang', '2020-04-28 09:57:15', 'update'),
(9, 'Huang Renjun', '678901', 'Kelapa Sawit', '2020-04-28 09:57:21', 'update'),
(10, 'Nana Jaemin', '721888', 'Wonogiri', '2020-04-28 09:57:31', 'update'),
(11, 'Huang Xuxi', '723672', 'Cilandak', '2020-04-28 09:57:37', 'update'),
(12, 'Kim Jungwoo', '283763', 'Cikarang', '2020-04-28 09:57:46', 'update'),
(13, 'Zhong Chenle', '112233', 'Bojongsoang', '2021-04-06 08:49:04', 'update'),
(14, 'Zhong Chenle', '112233', 'Bojongsoangg', '2021-04-06 08:49:13', 'update'),
(15, 'Huang Xuxi', '723672', 'Cilandak', '2021-04-06 08:49:38', 'delete'),
(16, 'Ghena', '12707', 'Bandung', '2021-04-10 06:38:09', 'tambah'),
(17, 'Zhong Chenle', '112233', 'Bojongsoang', '2021-04-10 06:38:47', 'update'),
(18, 'Ghena', '12707', 'Bandung', '2021-04-10 06:39:07', 'delete'),
(21, 'Park Jisung', '242526', 'Buah Batu', '2021-04-15 20:14:23', 'update'),
(22, 'Nana Jaemin', '721888', 'Wonogiri', '2021-04-15 21:31:49', 'delete'),
(23, 'Kim Jungwoo', '283763', 'Cikarang', '2021-04-15 21:31:53', 'delete'),
(26, 'Park Jisung', '242526', 'Buah Batu', '2021-04-15 22:50:40', 'delete'),
(27, 'Park Jisung', '242526', 'Girimarto', '2021-04-23 09:56:10', 'tambah'),
(28, 'Park Jisung', '242526', 'Girimarto', '2021-04-23 11:32:54', 'delete'),
(29, 'Park Jisung', '242526', 'Girimarto', '2021-04-23 11:39:34', 'tambah'),
(30, 'Park Jisung', '242526', 'Girimarto', '2021-04-23 11:40:06', 'update'),
(31, 'Huang Renjun', '101234', 'Girimarto', '2021-04-23 12:50:46', 'tambah'),
(32, 'Park Jisung', '242526', 'Girimarto', '2021-04-23 12:51:33', 'update'),
(33, 'Zhong Chenle', '293791', 'Doho', '2021-04-23 12:54:04', 'tambah'),
(34, 'Naurah Gardenifa', '729361', 'Bubakan', '2021-04-23 12:58:52', 'tambah'),
(35, 'Ardiana Primasari', '301820', 'Wonogiri', '2021-04-23 13:01:22', 'tambah'),
(36, 'Alya Putri', '172793', 'Sanan', '2021-04-23 13:04:29', 'tambah'),
(37, 'Citra Dewi Fortuna', '340826', 'Doho', '2021-04-23 13:06:45', 'tambah'),
(38, 'Lee Haechan', '827392', 'Girimarto', '2021-04-23 14:12:59', 'tambah'),
(39, 'Pelangi', '339829', 'Doho', '2021-04-23 14:16:12', 'tambah'),
(40, 'Betty', '393792', 'Girimarto', '2021-04-23 14:18:40', 'tambah'),
(41, 'Ervinna', '283973', 'Girimarto', '2021-04-23 14:20:46', 'tambah'),
(42, 'Radhita Canavarissa', '402839', 'Girimarto', '2021-04-23 19:03:58', 'tambah'),
(43, 'Alya Putri', '172793', 'Sanan', '2021-04-23 19:04:20', 'update'),
(44, 'Huang Renjun', '101234', 'Girimarto', '2021-05-25 17:58:56', 'update'),
(45, 'Yuna', '592738', 'Surakarta', '2021-05-25 19:21:07', 'tambah'),
(46, 'Hadzkya', '270521', 'Kedungringin', '2021-05-27 15:48:48', 'tambah'),
(47, 'Huang Renjun', '101234', 'Girimarto', '2021-05-27 19:09:24', 'update'),
(48, 'Huang Reenjun', '101234', 'Girimarto', '2021-05-27 19:09:32', 'update'),
(49, 'Emma Sweats', '010621', 'Girimarto', '2021-06-01 19:31:16', 'tambah'),
(50, 'Park Jisung', '242526', 'Sidoharjo', '2021-06-02 08:51:54', 'update'),
(51, 'Park Jisung', '242526', 'Sidoharjo', '2021-06-02 09:00:31', 'update'),
(52, 'Park Jisung', '242526', 'Sidoharjo', '2021-06-02 09:05:30', 'update'),
(53, 'Park Jisung', '242526', 'Sidoharjo', '2021-06-02 09:06:08', 'update'),
(54, 'Huang Renjun', '101234', 'Girimarto', '2021-06-02 09:22:14', 'update'),
(55, 'Emma Sweats', '010621', 'Girimarto', '2021-06-02 09:23:57', 'update'),
(56, 'Alya Putri', '172793', 'Bubakan', '2021-06-02 09:25:23', 'update'),
(57, 'Park Jisung', '242526', 'Sidoharjo', '2021-06-02 09:26:14', 'update'),
(58, 'Hadzkya', '270521', 'Kedungringin', '2021-06-02 09:27:02', 'update'),
(59, 'Putra Aleno', '172793', 'Bubakan', '2021-06-02 09:27:23', 'update'),
(60, 'Ervinna', '283973', 'Girimarto', '2021-06-02 09:28:31', 'update'),
(61, 'Zhong Chenle', '293791', 'Doho', '2021-06-02 09:29:23', 'update'),
(62, 'Ardiana Primasari', '301820', 'Wonogiri', '2021-06-02 09:30:10', 'update'),
(63, 'Pelangi', '339829', 'Doho', '2021-06-02 09:30:53', 'update'),
(64, 'Citra Dewi Fortuna', '340826', 'Doho', '2021-06-02 09:31:34', 'update'),
(65, 'Betty', '393792', 'Girimarto', '2021-06-02 09:32:18', 'update'),
(66, 'Radhita Canavarissa', '402839', 'Girimarto', '2021-06-02 09:32:53', 'update'),
(67, 'Yuna', '592738', 'Surakarta', '2021-06-02 09:33:30', 'update'),
(68, 'Naurah Gardenifa', '729361', 'Bubakan', '2021-06-02 09:34:03', 'update'),
(69, 'Lee Haechan', '827392', 'Girimarto', '2021-06-02 09:34:35', 'update'),
(70, 'Emma Sweats', '010621', 'Girimarto', '2021-07-06 20:59:48', 'update'),
(71, 'Emma Sweats', '010621', 'Girimarto', '2021-07-06 20:59:57', 'delete'),
(72, 'ar', '827382', 'Wonogiri', '2021-07-13 10:24:15', 'tambah'),
(73, 'ar', '827382', 'Wonogiri', '2021-07-13 10:25:01', 'update'),
(74, 'alll', '827382', 'Wonogiri', '2021-07-13 10:25:10', 'delete'),
(75, 'Ardhi', '19292837', 'Wonogiri', '2021-07-14 13:37:21', 'tambah'),
(76, 'Kya', '86868', 'Wonogiri', '2021-07-15 11:48:41', 'tambah'),
(77, 'Kya', '868687', 'Wonogiri', '2021-07-15 11:52:56', 'tambah'),
(78, 'Kya', '86868', 'Wonogiri', '2021-07-15 19:39:09', 'delete'),
(79, 'Popo', '192739', 'Wonogiri', '2021-07-15 21:03:00', 'tambah'),
(80, 'Enca Ditha', '399201', 'Surabaya', '2021-07-15 21:03:00', 'tambah'),
(81, 'Popo', '192739', 'Wonogiri', '2021-07-15 21:05:24', 'update'),
(82, 'Enca Ditha', '399201', 'Surabaya', '2021-07-15 21:06:02', 'update'),
(83, 'Huang Renjun', '101234', 'Girimarto', '2021-07-22 19:39:25', 'update'),
(84, 'Park Jisung', '242526', 'Sidoharjo', '2021-07-22 21:11:24', 'update'),
(85, 'dssd', '242355', 'Girimarto', '2021-07-23 19:57:50', 'tambah'),
(86, 'dssd', '242355', 'Girimarto', '2021-07-23 20:30:21', 'delete'),
(87, 'jgjgj', '253678', 'Girimarto', '2021-07-23 20:49:05', 'tambah'),
(88, 'jgjgj', '253678', 'Girimarto', '2021-07-23 23:06:46', 'delete'),
(89, 'Huang Renjun', '101234', 'Girimarto', '2021-07-24 10:02:40', 'update'),
(90, 'Huang Renjun', '101234', 'Girimarto', '2021-07-24 14:48:49', 'update'),
(91, 'Ardhi', '19292837', 'Wonogiri', '2021-07-24 14:50:44', 'update'),
(92, 'Ardhia', '19292837', 'Wonogiri', '2021-07-24 15:42:54', 'update'),
(93, 'Ardhia', '19292837', 'Wonogiri', '2021-07-24 19:36:39', 'update'),
(94, 'Ten', '293810', 'Girimarto', '2021-07-26 09:02:47', 'tambah'),
(95, 'Kim Yeri', '382891', 'Girimarto', '2021-07-26 09:02:47', 'tambah'),
(96, 'Marteen', '128739', 'Girimarto', '2021-07-26 09:02:47', 'tambah'),
(97, 'Nada', '293719', 'Sidoharjo', '2021-07-26 09:02:47', 'tambah'),
(98, 'Popo', '192739', 'Wonogiri', '2021-07-26 09:04:41', 'update'),
(99, 'Kya', '868687', 'Wonogiri', '2021-07-26 09:04:56', 'update'),
(100, 'Yuna', '592738', 'Surakarta', '2021-07-26 09:05:13', 'update'),
(101, 'Betty', '393792', 'Girimarto', '2021-07-26 09:05:34', 'update'),
(102, 'Rizky Fao', '297389', 'Bubakan', '2021-07-26 09:09:03', 'tambah'),
(103, 'Hadzkya', '270521', 'Kedungringin', '2021-07-26 09:10:24', 'update'),
(104, 'Lee Haechan', '827392', 'Girimarto', '2021-07-26 09:10:43', 'update'),
(105, 'Marteen', '128739', 'Girimarto', '2021-07-26 09:10:58', 'delete'),
(106, 'Ten', '293810', 'Girimarto', '2021-07-26 09:11:11', 'delete'),
(107, 'Kim Yeri', '382891', 'Girimarto', '2021-07-26 09:11:20', 'delete'),
(108, 'Nada', '293719', 'Sidoharjo', '2021-07-26 09:11:46', 'delete'),
(109, 'Ten', '293810', 'Girimarto', '2021-07-26 11:08:13', 'tambah'),
(110, 'Kim Yeri', '382891', 'Girimarto', '2021-07-26 11:08:15', 'tambah'),
(111, 'Marteen', '128739', 'Girimarto', '2021-07-26 11:08:15', 'tambah'),
(112, 'Nada', '293719', 'Sidoharjo', '2021-07-26 11:08:16', 'tambah'),
(113, 'Marteen', '128739', 'Girimarto', '2021-07-26 11:35:39', 'delete'),
(114, 'Nada', '293719', 'Sidoharjo', '2021-07-26 11:35:45', 'delete'),
(115, 'Ten', '293810', 'Girimarto', '2021-07-26 11:35:48', 'delete'),
(116, 'Kim Yeri', '382891', 'Girimarto', '2021-07-26 11:35:56', 'delete'),
(117, 'Ten', '293810', 'Girimarto', '2021-07-26 11:37:16', 'tambah'),
(118, 'Kim Yeri', '382891', 'Girimarto', '2021-07-26 11:37:16', 'tambah'),
(119, 'Marteen', '128739', 'Girimarto', '2021-07-26 11:37:16', 'tambah'),
(120, 'Nada', '293719', 'Sidoharjo', '2021-07-26 11:37:16', 'tambah'),
(121, 'Marteen', '128739', 'Girimarto', '2021-07-26 11:54:38', 'delete'),
(122, 'Nada', '293719', 'Sidoharjo', '2021-07-26 11:54:43', 'delete'),
(123, 'Ten', '293810', 'Girimarto', '2021-07-26 11:54:49', 'delete'),
(124, 'Kim Yeri', '382891', 'Girimarto', '2021-07-26 11:54:51', 'delete'),
(125, 'Ten', '293810', 'Girimarto', '2021-07-26 11:54:58', 'tambah'),
(126, 'Kim Yeri', '382891', 'Girimarto', '2021-07-26 11:54:58', 'tambah'),
(127, 'Marteen', '128739', 'Girimarto', '2021-07-26 11:54:59', 'tambah'),
(128, 'Nada', '293719', 'Sidoharjo', '2021-07-26 11:54:59', 'tambah'),
(129, 'Marteen', '128739', 'Girimarto', '2021-07-26 19:42:45', 'delete'),
(130, 'Nada', '293719', 'Sidoharjo', '2021-07-26 19:42:51', 'delete'),
(131, 'Ten', '293810', 'Girimarto', '2021-07-26 19:42:54', 'delete'),
(132, 'Kim Yeri', '382891', 'Girimarto', '2021-07-26 19:42:58', 'delete'),
(133, 'Ten', '293810', 'Girimarto', '2021-07-26 19:43:14', 'tambah'),
(134, 'Kim Yeri', '382891', 'Girimarto', '2021-07-26 19:43:14', 'tambah'),
(135, 'Marteen', '128739', 'Girimarto', '2021-07-26 19:43:14', 'tambah'),
(136, 'Nada', '293719', 'Sidoharjo', '2021-07-26 19:43:14', 'tambah'),
(137, 'Marteen', '128739', 'Girimarto', '2021-07-26 20:10:40', 'delete'),
(138, 'Nada', '293719', 'Sidoharjo', '2021-07-26 20:10:47', 'delete'),
(139, 'Kim Yeri', '382891', 'Girimarto', '2021-07-26 20:10:51', 'delete'),
(140, 'Ten', '293810', 'Girimarto', '2021-07-26 20:11:03', 'delete'),
(141, 'Ten', '293810', 'Girimarto', '2021-07-26 20:13:11', 'tambah'),
(142, 'Kim Yeri', '382891', 'Girimarto', '2021-07-26 20:13:11', 'tambah'),
(143, 'Marteen', '128739', 'Girimarto', '2021-07-26 20:13:11', 'tambah'),
(144, 'Nada', '293719', 'Sidoharjo', '2021-07-26 20:13:11', 'tambah'),
(145, 'Marteen', '128739', 'Girimarto', '2021-07-26 20:23:14', 'delete'),
(146, 'Nada', '293719', 'Sidoharjo', '2021-07-26 20:23:19', 'delete'),
(147, 'Ten', '293810', 'Girimarto', '2021-07-26 20:23:24', 'delete'),
(148, 'Kim Yeri', '382891', 'Girimarto', '2021-07-26 20:23:27', 'delete'),
(149, 'Ten', '293810', 'Girimarto', '2021-07-26 20:23:41', 'tambah'),
(150, 'Kim Yeri', '382891', 'Girimarto', '2021-07-26 20:23:41', 'tambah'),
(151, 'Marteen', '128739', 'Girimarto', '2021-07-26 20:23:41', 'tambah'),
(152, 'Nada', '293719', 'Sidoharjo', '2021-07-26 20:23:41', 'tambah'),
(163, 'Hyunsuk', '436839', 'Surakarta', '2021-07-26 20:40:56', 'tambah'),
(164, 'Haruto', '223871', 'Sukoharjo', '2021-07-26 20:40:56', 'tambah'),
(165, 'Eu', '192793', 'Girimarto', '2021-07-26 20:40:56', 'tambah'),
(166, 'Yerim', '197282', 'Girimarto', '2021-07-26 20:40:56', 'tambah'),
(167, 'Eu', '192793', 'Girimarto', '2021-07-26 21:05:59', 'delete'),
(168, 'Yerim', '197282', 'Girimarto', '2021-07-26 21:06:06', 'delete'),
(169, 'Hyunsuk', '436839', 'Surakarta', '2021-07-26 21:06:14', 'delete'),
(170, 'Haruto', '223871', 'Sukoharjo', '2021-07-26 21:06:19', 'delete'),
(171, 'Hyunsuk', '436839', 'Surakarta', '2021-07-26 21:07:06', 'tambah'),
(172, 'Haruto', '223871', 'Sukoharjo', '2021-07-26 21:07:06', 'tambah'),
(173, 'Eu', '192793', 'Girimarto', '2021-07-26 21:07:06', 'tambah'),
(174, 'Yerim', '197282', 'Girimarto', '2021-07-26 21:07:06', 'tambah'),
(175, 'Eu', '192793', 'Girimarto', '2021-07-27 09:11:37', 'delete'),
(176, 'Haruto', '223871', 'Sukoharjo', '2021-07-27 09:11:41', 'delete'),
(177, 'Hyunsuk', '436839', 'Surakarta', '2021-07-27 09:11:53', 'delete'),
(178, 'Yerim', '197282', 'Girimarto', '2021-07-27 09:12:00', 'delete'),
(179, 'Hyunsuk', '436839', 'Surakarta', '2021-07-27 09:12:20', 'tambah'),
(180, 'Haruto', '223871', 'Sukoharjo', '2021-07-27 09:12:20', 'tambah'),
(181, 'Eu', '192793', 'Girimarto', '2021-07-27 09:12:21', 'tambah'),
(182, 'Yerim', '197282', 'Girimarto', '2021-07-27 09:12:21', 'tambah'),
(183, 'Huang Renjun', '101234', 'Girimarto', '2021-07-27 09:17:08', 'update'),
(184, 'Huang Renjun', '101234', 'Girimarto', '2021-07-27 09:17:43', 'update'),
(185, 'Sungchan', '128391', 'Girimarto', '2021-07-27 09:19:34', 'tambah'),
(186, 'Huang Renjun', '101234', 'Girimarto', '2021-07-27 10:06:26', 'update'),
(187, 'Huang Renjuni', '101234', 'Girimarto', '2021-07-27 10:06:54', 'update'),
(188, 'Huang Renjun', '101234', 'Girimarto', '2021-07-27 10:07:08', 'update'),
(189, 'Popo', '192739', 'Wonogiri', '2021-07-27 15:40:45', 'update'),
(190, 'Popo', '192739', 'Wonogiri', '2021-07-27 15:45:04', 'update'),
(191, 'Raihan', '283739', 'Girimarto', '2021-07-28 08:24:59', 'tambah'),
(192, 'Jake', '293737', 'Girimarto', '2021-07-28 08:24:59', 'tambah'),
(193, 'Jisoo', '182730', 'Girimarto', '2021-07-28 08:25:00', 'tambah'),
(194, 'Tyuzu', '179379', 'Girimarto', '2021-07-28 08:25:00', 'tambah'),
(195, 'Jisoo', '182730', 'Girimarto', '2021-07-28 08:25:14', 'delete'),
(196, 'Tyuzu', '179379', 'Girimarto', '2021-07-28 08:25:18', 'delete'),
(197, 'Raihan', '283739', 'Girimarto', '2021-07-28 08:25:26', 'delete'),
(198, 'Jake', '293737', 'Girimarto', '2021-07-28 08:25:33', 'delete'),
(199, 'Raihan', '283739', 'Girimarto', '2021-07-29 14:08:25', 'tambah'),
(200, 'Jake', '293737', 'Girimarto', '2021-07-29 14:08:25', 'tambah'),
(201, 'Jisoo', '182730', 'Girimarto', '2021-07-29 14:08:26', 'tambah'),
(202, 'Tyuzu', '179379', 'Girimarto', '2021-07-29 14:08:26', 'tambah'),
(203, 'hjj', '754678', 'Wonogiri', '2021-08-20 16:23:00', 'tambah'),
(204, 'hjj', '754678', 'Wonogiri', '2021-08-20 16:23:44', 'update'),
(205, 'hjj', '754678', 'Bandung', '2021-08-20 16:23:52', 'delete'),
(206, 'Huang Renjun', '101234', '', '2021-08-20 16:25:40', 'update'),
(207, 'Huang Renjun', '101234', '', '2021-08-20 16:25:58', 'update'),
(208, 'Huang Renjun', '101234', 'Wonogiri', '2021-08-20 16:26:22', 'update'),
(209, 'Sungchan', '128391', '', '2021-08-20 16:27:51', 'update'),
(210, 'Rizky Fao', '297389', '', '2021-08-20 18:09:45', 'update'),
(211, 'Betty', '393792', '', '2021-08-20 18:10:13', 'update'),
(212, 'Yuna', '592738', '', '2021-08-20 18:10:51', 'update'),
(213, 'Huang Renjun', '101234', 'Wonogiri', '2021-08-21 11:21:15', 'update'),
(214, 'Sungchan', '128391', 'Wonogiri', '2021-08-21 11:22:56', 'update'),
(215, 'Marteen', '128739', '', '2021-08-21 11:23:57', 'update'),
(216, 'Putra Aleno', '172793', '', '2021-08-21 11:25:42', 'update'),
(217, 'Tyuzu', '179379', '', '2021-08-21 11:26:20', 'update'),
(218, 'Jisoo', '182730', '', '2021-08-21 11:27:18', 'update'),
(219, 'Huang Renjun', '101234', 'Wonogiri', '2021-08-21 11:27:44', 'update'),
(220, 'Sungchan', '128391', 'Wonogiri', '2021-08-21 11:28:24', 'update'),
(221, 'Popo', '192739', '', '2021-08-21 11:29:28', 'update'),
(222, 'Eu', '192793', '', '2021-08-21 11:30:33', 'update'),
(223, 'Ardhia', '19292837', '', '2021-08-21 11:31:24', 'update'),
(224, 'Yerim', '197282', '', '2021-08-21 11:32:07', 'update'),
(225, 'Haruto', '223871', '', '2021-08-21 11:33:13', 'update'),
(226, 'Park Jisung', '242526', '', '2021-08-21 11:34:25', 'update'),
(227, 'Hadzkya', '270521', '', '2021-08-21 11:35:01', 'update'),
(228, 'Raihan', '283739', '', '2021-08-21 11:35:42', 'update'),
(229, 'Ervinna', '283973', '', '2021-08-21 11:36:28', 'update'),
(230, 'Nada', '293719', '', '2021-08-21 11:36:57', 'update'),
(231, 'Park Jisung', '242526', 'Wonogiri', '2021-08-21 11:37:17', 'update'),
(232, 'Jake', '293737', '', '2021-08-21 11:38:06', 'update'),
(233, 'Zhong Chenle', '293791', '', '2021-08-21 11:38:34', 'update'),
(234, 'Ten', '293810', '', '2021-08-21 11:39:05', 'update'),
(235, 'Rizky Fao', '297389', '', '2021-08-21 11:39:50', 'update'),
(236, 'Ardiana Primasari', '301820', '', '2021-08-21 11:40:23', 'update'),
(237, 'Pelangi', '339829', '', '2021-08-21 11:40:49', 'update'),
(238, 'Citra Dewi Fortuna', '340826', '', '2021-08-21 11:41:13', 'update'),
(239, 'Kim Yeri', '382891', '', '2021-08-21 11:41:37', 'update'),
(240, 'Betty', '393792', '', '2021-08-21 11:42:06', 'update'),
(241, 'Enca Ditha', '399201', '', '2021-08-21 11:42:42', 'update'),
(242, 'Radhita Canavarissa', '402839', '', '2021-08-21 11:43:08', 'update'),
(243, 'Hyunsuk', '436839', '', '2021-08-21 11:43:37', 'update'),
(244, 'Yuna', '592738', '', '2021-08-21 11:44:01', 'update'),
(245, 'Naurah Gardenifa', '729361', '', '2021-08-21 11:44:25', 'update'),
(246, 'Lee Haechan', '827392', '', '2021-08-21 11:44:52', 'update'),
(247, 'Kya', '868687', '', '2021-08-21 11:45:15', 'update'),
(248, 'Putra Aleno', '172793', 'Wonogiri', '2021-08-21 11:49:17', 'update'),
(249, 'Ervinna', '283973', 'Wonogiri', '2021-08-21 12:23:34', 'update'),
(250, 'Zhong Chenle', '293791', 'Wonogiri', '2021-08-21 12:24:03', 'update'),
(251, 'Naurah Gardenifa', '729361', 'Wonogiri', '2021-08-21 12:24:20', 'update'),
(252, 'Huang Renjun', '101234', 'Wonogiri', '2021-08-21 18:04:22', 'update'),
(253, 'Huang Renjun', '101234', 'Wonogiri', '2021-08-21 18:04:51', 'update'),
(254, 'Huang Renjun', '101234', 'Wonogiri', '2021-08-21 18:05:59', 'update'),
(255, 'Huang Renjun', '101234', 'Wonogiri', '2021-08-21 18:06:11', 'update'),
(256, 'Park Jisung', '242526', 'Wonogiri', '2021-08-21 20:40:00', 'update'),
(257, 'Huang Renjun', '101234', 'Wonogiri', '2021-08-22 08:27:08', 'update'),
(258, '', '101234', 'Wonogiri', '2021-08-22 08:27:58', 'update'),
(259, 'Huang Renjun', '101234', 'Wonogiri', '2021-08-22 10:59:56', 'update'),
(260, 'Huang Renjunb', '101234', 'Wonogiri', '2021-08-22 11:02:09', 'update'),
(261, 'Huang Renjun', '101234', 'Wonogiri', '2021-08-22 11:02:42', 'update'),
(262, 'Huang Renjun', '101234', 'Wonogiri', '2021-08-22 11:03:20', 'update'),
(263, 'Huang Renjun', '101234', 'Wonogiri', '2021-08-22 11:03:38', 'update'),
(264, 'Huang Renjun', '101234', 'Wonogiri', '2021-08-22 11:04:45', 'update'),
(265, 'Huang Renjun', '101234', 'Wonogiri', '2021-08-22 11:09:41', 'update'),
(266, 'Huang Renjun', '101234', 'Wonogiri', '2021-08-22 11:10:22', 'update'),
(267, 'Park Jisung', '242526', 'Wonogiri', '2021-08-22 11:11:04', 'update'),
(268, 'Park Jisung', '242526', 'Wonogiri', '2021-08-22 11:12:48', 'update'),
(269, 'Jisoo', '182730', 'Wonogiri', '2021-08-23 13:04:42', 'update'),
(270, 'Tristiana', '293730', 'Wonogiri', '2021-08-30 10:09:57', 'tambah'),
(271, 'Tristiana', '293730', 'Wonogiri', '2021-08-30 10:10:06', 'delete');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nama_guru` varchar(255) DEFAULT NULL,
  `nik` varchar(11) NOT NULL,
  `jalan` varchar(255) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `agama` varchar(255) NOT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `poto` varchar(255) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nama_guru`, `nik`, `jalan`, `kecamatan`, `kota`, `provinsi`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `status`, `poto`, `admin_id`) VALUES
('Lee Taeyong', '1285645', 'Doho Lor', 'Girimarto', 'Wonogiri', 'Jawa Tengah', 'Jakarta', '1980-06-17', 'Laki-Laki', 'Islam', '08293738792', 'PNS', 'poto-1.jpg', 3),
('Lisa Manoban', '228289', 'Doho', 'Girimarto', 'Wonogiri', 'Jawa Tengah', 'Wonogiri', '1987-08-20', 'Perempuan', 'Islam', '08238197829', 'PNS', 'poto-1.jpg', NULL),
('Ghea', '2937012', 'Sidoarjo', 'Sidoarjo', 'Wonogiri', 'Jawa Tengah', 'Wonogiri', '1980-10-02', 'Perempuan', 'Islam', '0828379428', 'PNS', 'poto-1.jpg', NULL),
('Moon Taeil', '7402790', 'DOho', 'Girimarto', 'Wonogiri', 'Jawa Tengah', 'Wonogiri', '1986-10-02', 'Laki-Laki', 'Islam', '082383793743', 'PNS', 'poto-1.jpg', NULL),
('Jung Jaehyun', '88645789', 'Sanan', 'Girimarto', 'Wonogiri', 'Jawa Tengah', 'Wonogiri', '1990-06-02', 'Laki-Laki', 'Kristen', '08283794793', 'PNS', 'poto-1.jpg', NULL),
('Na Yuta', '9472937', 'Ngadirojo', 'Girimarto', 'Wonogiri', 'Jawa Tengah', 'Wonogiri', '1970-04-13', 'Laki-Laki', 'Islam', '08329379438', 'Honorer', 'poto-1.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hubungi`
--

CREATE TABLE `hubungi` (
  `hubungi_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pesan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hubungi`
--

INSERT INTO `hubungi` (`hubungi_id`, `nama`, `email`, `pesan`) VALUES
(3, 'ardhiani', 'kusumaardhiani@gmail.com', 'Bagaimana cara mendaftar sekolah'),
(7, 'Jisung', 'jis@gmail.com', 'Apakah nilai akhir sudah keluar?');

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `identitas_id` int(11) NOT NULL,
  `nama_website` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`identitas_id`, `nama_website`, `alamat`, `email`, `telp`) VALUES
(1, 'APLIKASI PENILAIAN SISWA SMA NEGERI 1 GIRIMARTO', 'Jalan Maron - Girimarto, Girimarto, Wonogiri, Jawa Tengah', 'smagirimarto@yahoo.co.id', '085100301407');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `kode_mapel` varchar(15) NOT NULL,
  `mapel` varchar(50) DEFAULT NULL,
  `jp` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`kode_mapel`, `mapel`, `jp`) VALUES
('BI', 'Bahasa Indonesia', '4'),
('BIng', 'Bahasa Inggris', '2'),
('BJ', 'Bahasa Jawa', '2'),
('BL', 'Biologi', '3'),
('BSI', 'Sastra Inggris', '3'),
('BSIN', 'Sastra Indonesia', '3'),
('EKM', 'Ekonomi', '3'),
('FI', 'Fisika', '3'),
('KI', 'Kimia', '3'),
('KWU', 'Prakarya dan Kewirausahaan', '2'),
('MTK', 'Matematika', '4'),
('OR', 'Olahraga', '3'),
('PAI', 'Pendidikan Agama dan Budi Pekerti', '3'),
('PKN', 'Pendidikan Pancasila dan Kewarganegaraan', '2'),
('SB', 'Seni Budaya', '2'),
('SI', 'Sejarah Indonesia', '2');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `nilai_id` int(11) NOT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `nik` varchar(11) DEFAULT NULL,
  `tahun_akademik` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `ulangan_harian` int(11) DEFAULT NULL,
  `tugas` int(11) DEFAULT NULL,
  `uts` int(11) DEFAULT NULL,
  `uas` int(11) DEFAULT NULL,
  `nilaiakhir` int(11) NOT NULL,
  `indek` varchar(50) NOT NULL,
  `evaluasi` varchar(255) NOT NULL,
  `kode_mapel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`nilai_id`, `nis`, `nik`, `tahun_akademik`, `semester`, `ulangan_harian`, `tugas`, `uts`, `uas`, `nilaiakhir`, `indek`, `evaluasi`, `kode_mapel`) VALUES
(185, '242526', '1285645', '2020/2021', 'Genap', 95, 75, 90, 83, 86, 'B', 'Sudah sangat bagus nilainya, tapi ditingkatkan lagi!', 'BI'),
(186, '242526', '1285645', '2020/2021', 'Ganjil', 84, 75, 70, 90, 80, 'C', 'Sudah sangat bagus nilainya, tapi ditingkatkan lagi!', 'BI'),
(187, '242526', '1285645', '2020/2021', 'Genap', 75, 75, 87, 83, 81, 'B', 'Sudah sangat bagus nilainya, tapi ditingkatkan lagi!', 'EKM');

-- --------------------------------------------------------

--
-- Table structure for table `orang_tua`
--

CREATE TABLE `orang_tua` (
  `id` int(11) NOT NULL,
  `system_login_id` int(11) DEFAULT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `pekerjaan_ayah` varchar(255) NOT NULL,
  `no_telp_ayah` varchar(15) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `pekerjaan_ibu` varchar(255) NOT NULL,
  `no_telp_ibu` varchar(15) NOT NULL,
  `nama_wali` varchar(255) NOT NULL,
  `no_telp_wali` varchar(15) NOT NULL,
  `pekerjaan_wali` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orang_tua`
--

INSERT INTO `orang_tua` (`id`, `system_login_id`, `nama_ayah`, `pekerjaan_ayah`, `no_telp_ayah`, `nama_ibu`, `pekerjaan_ibu`, `no_telp_ibu`, `nama_wali`, `no_telp_wali`, `pekerjaan_wali`) VALUES
(2, NULL, 'Nono', 'PNS', '8293783792', 'Yerin', 'Ibu Rumah Tangga', '82971832818', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(3, NULL, 'Nono', 'PNS', '8293783792', 'Yerin', 'Ibu Rumah Tangga', '82971832818', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(4, NULL, 'Nono', 'PNS', '8293783792', 'Yerin', 'Ibu Rumah Tangga', '82971832818', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(5, NULL, 'Nono', 'PNS', '8293783792', 'Yerin', 'Ibu Rumah Tangga', '82971832818', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(6, NULL, 'Ilham', 'Wiraswasta', '083297367182', 'Yani', 'Wiraswasta', '082831882962', '', '0', ''),
(7, NULL, 'Ari', 'Wiraswasta', '8283872392', 'Nisa', 'Wiraswasta', '8263872837', 'Tidak ada', 'Tidak ada', 'Tidak ada'),
(8, NULL, 'Ar', 'Wiraswasta', '0823727838', 'Ab', 'Ibu Rumah Tangga', '08238628', '', '0', ''),
(9, 6, 'Park Siwon', 'Wiraswasta', 'Wiraswasta', 'Park Ki Young', 'Wiraswasta', '0829372868122', '', '0', ''),
(10, NULL, 'Tedy', 'Buruh', '082323861863', 'Rizky', 'Bidan', '082283687821', '', '0', ''),
(11, 10, 'Huang Xuxi', 'PNS', 'PNS', 'Huang Yuqi', 'Ibu Rumah Tangga', '0827391635273', '', '0', ''),
(12, NULL, 'Zhong Suho', 'Guru', '08218271873681', 'Zhong Zeya', 'Ibu Rumah Tangga', '0828368263813', '', '0', ''),
(13, 12, 'Ardian', 'Guru', 'Guru', 'Sri', 'Ibu Rumah Tangga', '082783618723', '', '0', ''),
(14, NULL, 'Semesta', 'Pilot', '082382381691', 'Sky', 'Wiraswasta', '0823972183619', '', '0', ''),
(15, NULL, 'Indra', 'PNS', '0823872973189', 'Yulia', 'Ibu Rumah Tangga', '083283689219', '', '0', ''),
(16, NULL, 'Reno', 'PNS', '082838716382', 'Intan', 'Ibu Rumah Tangga', '082397183612', '', '0', ''),
(17, NULL, 'Nono', 'PNS', '8293783792', 'Yerin', 'Ibu Rumah Tangga', '82971832818', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(18, NULL, 'Budi', 'PNS', '8286217611', 'Dina', 'Ibu Rumah Tangga', '82974827828', 'Tidak ada', 'Tidak ada', 'Tidak ada'),
(19, NULL, 'Raditya', 'PNS', '083286238168', 'Putri Ayu', 'Wiraswasta', '082831832993', '', '0', ''),
(20, NULL, 'Liam', 'Dosen', '082368218138', 'Denise', 'Wiraswasta', '0828236187682', '', '0', ''),
(21, NULL, 'Bayu', 'Wiraswasta', '082836187612', 'Salsabilla', 'Wiraswasta', '082732832812', '', '0', ''),
(22, NULL, 'Budi', 'Dokter', '082369278122', 'Annisa', 'Ibu Rumah Tangga', '082387182681', '', '0', ''),
(24, NULL, 'sdfjkl', 'fghjkl', '567890', 'vbnmn', 'dgfh', '98654', '', '', ''),
(25, NULL, 'Han', 'Dokter', 'Dokter', 'Bila', 'Ibu Rumah Tangga', '082836283299', '', '', ''),
(26, NULL, 'Nanon', 'Wiraswasta', '86453768797', 'Cecyl', 'PNS', '82752768226', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(27, NULL, 'Mark', 'PNS', '87655273628', 'Yoaa', 'Ibu Rumah Tangga', '82632837292', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(28, NULL, 'Rizky', 'Buruh', '86236736821', 'Angelina', 'Guru', '87263788112', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(29, NULL, 'Bara', 'PNS', '82828378289', 'Jessica', 'Ibu Rumah Tangga', '82763833891', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(30, NULL, 'Nanon', 'Wiraswasta', '86453768797', 'Cecyl', 'PNS', '82752768226', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(31, NULL, 'Mark', 'PNS', '87655273628', 'Yoaa', 'Ibu Rumah Tangga', '82632837292', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(32, NULL, 'Rizky', 'Buruh', '86236736821', 'Angelina', 'Guru', '87263788112', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(33, NULL, 'Bara', 'PNS', '82828378289', 'Jessica', 'Ibu Rumah Tangga', '82763833891', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(34, NULL, 'Nanon', 'Wiraswasta', 'Wiraswasta', 'Cecyl', 'PNS', '82752768226', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(35, NULL, 'Mark', 'PNS', 'PNS', 'Yoaa', 'Ibu Rumah Tangga', '82632837292', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(36, NULL, 'Rizky', 'Buruh', 'Buruh', 'Angelina', 'Guru', '87263788112', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(37, NULL, 'Bara', 'PNS', 'PNS', 'Jessica', 'Ibu Rumah Tangga', '82763833891', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(48, NULL, 'Jaehyuck', 'Wiraswasta', '86453768797', 'Disaa', 'PNS', '82752768226', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(49, NULL, 'Johnny', 'PNS', '87655273628', 'Myselia', 'Ibu Rumah Tangga', '82632837292', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(50, NULL, 'Juno', 'PNS', '8382728929', 'Dina', 'Ibu Rumah Tangga', '8239239492', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(51, NULL, 'Sean', 'PNS', '8263286288', 'Jwifa', 'Ibu Rumah Tangga', '8238273628', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(52, NULL, 'Jaehyuck', 'Wiraswasta', '86453768797', 'Disaa', 'PNS', '82752768226', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(53, NULL, 'Johnny', 'PNS', '87655273628', 'Myselia', 'Ibu Rumah Tangga', '82632837292', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(54, NULL, 'Juno', 'PNS', '8382728929', 'Dina', 'Ibu Rumah Tangga', '8239239492', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(55, NULL, 'Sean', 'PNS', '8263286288', 'Jwifa', 'Ibu Rumah Tangga', '8238273628', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(56, NULL, 'Jaehyuck', 'Wiraswasta', 'Wiraswasta', 'Disaa', 'PNS', '82752768226', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(57, NULL, 'Johnny', 'PNS', 'PNS', 'Myselia', 'Ibu Rumah Tangga', '82632837292', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(58, NULL, 'Juno', 'PNS', 'PNS', 'Dina', 'Ibu Rumah Tangga', '8239239492', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(59, NULL, 'Sean', 'PNS', 'PNS', 'Jwifa', 'Ibu Rumah Tangga', '8238273628', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(60, NULL, 'Sunghoon', 'Dosen', 'Dosen', 'Terra', 'Ibu Rumah Tangga', '08293784829', '', '', ''),
(61, NULL, 'Rudy', 'PNS', '82836738839', 'Dian', 'Ibu Rumah Tangga', '82836826882', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(62, NULL, 'Jungkook', 'PNS', '82783683682', 'Yunita', 'Ibu Rumah Tangga', '82837688362', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(63, NULL, 'Jean', 'PNS', '82387628827', 'Shella', 'Ibu Rumah Tangga', '82863728822', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(64, NULL, 'Taehyung', 'PNS', '82762327828', 'Arum', 'Ibu Rumah Tangga', '82863872392', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(65, NULL, 'Rudy', 'PNS', 'PNS', 'Dian', 'Ibu Rumah Tangga', '82836826882', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(66, NULL, 'Jungkook', 'PNS', 'PNS', 'Yunita', 'Ibu Rumah Tangga', '82837688362', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(67, NULL, 'Jean', 'PNS', 'PNS', 'Shella', 'Ibu Rumah Tangga', '82863728822', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(68, NULL, 'Taehyung', 'PNS', 'PNS', 'Arum', 'Ibu Rumah Tangga', '82863872392', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada'),
(69, NULL, 'Ardian', 'Dosen', 'Dosen', 'Ab', 'Ibu Rumah Tangga', '082668162732', '', '', ''),
(70, NULL, 'PNS', '82839281623', 'Kimel', 'Ibu Rumah Tangga', '82983474989', 'Tidak Ada ', 'Tidak Ada', 'Tidak Ada', 'poto-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nama_siswa` varchar(255) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `orang_tua_id` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `jalan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL,
  `agama` varchar(255) NOT NULL,
  `poto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nama_siswa`, `admin_id`, `orang_tua_id`, `nis`, `kelas`, `nama_guru`, `status`, `jalan`, `kecamatan`, `kota`, `provinsi`, `no_hp`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `poto`) VALUES
('Huang Renjun', 10, 11, '101234', '10 IPS-1', 'Lee Taeyong', 'Aktif', 'Gemawang RT 01, RW 02', 'Girimarto', 'Wonogiri', 'Jawa Tengah', '082371937126', 'Malang', '2021-04-23', 'Laki-Laki', 'Buddha', 'poto-1.jpg'),
('Sungchan', NULL, 60, '128391', '10 IPS-5', 'Lee Taeyong', 'Aktif', 'Doho Kidul RT 03, RW 01', 'Girimarto', 'Wonogiri', 'Jawa Tengah', '08283681231', 'Wonogiri', '2007-11-29', 'Laki-Laki', 'Islam', 'poto-1.jpg'),
('Marteen', NULL, 36, '128739', '10 MIPA-4', 'Lee Taeyong', 'Aktif', 'Maron', 'Girimarto', 'Wonogiri', 'Jawa Tengah', '82358378193', 'Wonogiri', '0000-00-00', 'Laki-Laki', 'Islam', 'poto-1.jpg'),
('Putra Aleno', NULL, 0, '172793', '10 MIPA-2', 'Na Yuta', 'Aktif', 'Bubakan', 'Girimarto', 'Wonogiri', 'Jawa Tengah', '0828368167627', 'Surakarta', '2005-06-25', 'Laki-Laki', 'Islam', 'poto-1.jpg'),
('Tyuzu', NULL, 68, '179379', '10 MIPA-2', 'Lee Taeyong', 'Aktif', 'Jendi', 'Girimarto', 'Wonogiri', 'Jawa Tengah', '8376327829', 'Bandung', '0000-00-00', 'Perempuan', 'Islam', 'poto-1.jpg'),
('Jisoo', NULL, 67, '182730', '10 MIPA-2', 'Lee Taeyong', 'Aktif', 'Nungkulan', 'Girimarto', 'Wonogiri', 'Jawa Tengah', '8273628892', 'Makassar', '0000-00-00', 'Perempuan', 'Kristen', 'poto-1.jpg'),
('Popo', 12, 13, '192739', '10 IPS-2', 'Moon Taeil', 'Lulus', 'Watuagung RT 01, RW 01', 'Girimarto', 'Wonogiri', 'Jawa Tengah', '82736816881', 'Surakarta', '2006-02-01', 'Laki-Laki', 'Islam', 'poto-1.jpg'),
('Eu', NULL, 58, '192793', '10 MIPA-2', 'Lee Taeyong', 'Aktif', 'Pahlawan RT 01, RW 02', 'Sidoarjo', 'Wonogiri', 'Jawa Tengah', '8283782648', 'Bandung', '0000-00-00', 'Perempuan', 'Islam', 'poto-1.jpg'),
('Ardhia', NULL, 0, '19292837', '10 IPS-2', 'Moon Taeil', 'Lulus', 'Sanan ', 'Girimarto', 'Wonogiri', 'Jawa Tengah', '0828392368', 'Wonogiri', '2005-10-24', 'Perempuan', 'Islam', 'poto-1.jpg'),
('Yerim', NULL, 59, '197282', '10 MIPA-2', 'Lisa Manoban', 'Aktif', 'Bubakan RT 02, RW 02', 'Girimarto', 'Wonogiri', 'Jawa Tengah', '8283628298', 'Jakarta', '0000-00-00', 'Perempuan', 'Islam', 'poto-1.jpg'),
('Haruto', NULL, 57, '223871', '10 MIPA-2', 'Lee Taeyong', 'Aktif', 'Perumahan Pucang No. 5', 'Sidoarjo', 'Wonogiri', 'Jawa Tengah', '8278362763', 'Wonogiri', '0000-00-00', 'Laki-Laki', 'Islam', 'poto-1.jpg'),
('Park Jisung', 6, 9, '242526', '10 MIPA-1', 'Lee Taeyong', 'Aktif', 'Sidodadi RT 01, RW 02', 'Sidoarjo', 'Wonogiri', 'Jawa Tengah', '082937187282', 'Jakarta', '2006-02-05', 'Laki-Laki', 'Islam', 'poto-1.jpg'),
('Hadzkya', NULL, 0, '270521', '10 MIPA-3', 'Moon Taeil', 'Lulus', 'Kedungringin', 'Wonogiri', 'Wonogiri', 'Jawa Tengah', '0823717281788', 'Wonogiri', '2005-05-10', 'Perempuan', 'Islam', 'poto-1.jpg'),
('Raihan', NULL, 65, '283739', '10 MIPA-5', 'Lee Taeyong', 'Aktif', 'Doho Lor RT 02, RW 03', 'Girimarto', 'Wonogiri', 'Jawa Tengah', '8286386387', 'Wonogiri', '0000-00-00', 'Laki-Laki', 'Islam', 'poto-1.jpg'),
('Ervinna', NULL, 0, '283973', '10 MIPA-2', 'Jung Jaehyun', 'Aktif', 'Doho Lor RT 02, RW 03', 'Girimarto', 'Wonogiri', 'Jawa Tengah', '0822971812873', 'Wonogiri', '2005-06-18', 'Perempuan', 'Kristen', 'poto-1.jpg'),
('Nada', NULL, 37, '293719', '10 IPS-1', 'Lee Taeyong', 'Aktif', 'Doho Kidul RT 02, RW 01', 'Girimarto', 'Wonogiri', 'Jawa Tengah', '81826182681', 'Wonogiri', '0000-00-00', 'Perempuan', 'Islam', 'poto-1.jpg'),
('Jake', NULL, 66, '293737', '10 MIPA-5', 'Lee Taeyong', 'Aktif', 'Doho Kidul RT 01, RW 01', 'Girimarto', 'Wonogiri', 'Jawa Tengah', '8363278292', 'Wonogiri', '0000-00-00', 'Laki-Laki', 'Islam', 'poto-1.jpg'),
('Zhong Chenle', NULL, 0, '293791', '10 MIPA-4', 'Jung Jaehyun', 'Aktif', 'Doho', 'Girimarto', 'Wonogiri', 'Jawa Tengah', '0822973812368', 'Jakarta', '2008-11-26', 'Laki-Laki', 'Kristen', 'poto-1.jpg'),
('Ten', NULL, 34, '293810', '10 MIPA-2', 'Lee Taeyong', 'Aktif', 'Sanan ', 'Girimarto', 'Wonogiri', 'Jawa Tengah', '82763187225', 'Wonogiri', '0000-00-00', 'Laki-Laki', 'Islam', 'poto-1.jpg'),
('Rizky Fao', NULL, 25, '297389', '10 BB', 'Jung Jaehyun', 'Undur Diri', 'Bubakan', 'Girimarto', 'Wonogiri', 'Jawa Tengah', '0838372921', 'Wonogiri', '2003-10-25', 'Perempuan', 'Islam', 'poto-1.jpg'),
('Ardiana Primasari', NULL, 0, '301820', '10 IPS-1', 'Jung Jaehyun', 'Aktif', 'Sidodadi RT 01, RW 02', 'Sidoarjo', 'Wonogiri', 'Jawa Tengah', '08293718378', 'Wonogiri', '2021-04-23', 'Perempuan', 'Islam', 'poto-1.jpg'),
('Pelangi', NULL, 0, '339829', '10 MIPA-1', 'Jung Jaehyun', 'Aktif', 'Doho', 'Girimarto', 'Wonogiri', 'Jawa Tengah', '0828738176387', 'Wonogiri', '2007-04-23', 'Perempuan', 'Islam', 'poto-1.jpg'),
('Citra Dewi Fortuna', NULL, 0, '340826', '10 IPS-3', 'Na Yuta', 'Aktif', 'Doho', 'Girimarto', 'Wonogiri', 'Jawa Tengah', '082387293719', 'Wonogiri', '2006-01-01', 'Perempuan', 'Islam', 'poto-1.jpg'),
('Kim Yeri', NULL, 35, '382891', '10 MIPA-2', 'Na Yuta', 'Aktif', 'Sanan ', 'Girimarto', 'Wonogiri', 'Jawa Tengah', '86178352819', 'Wonogiri', '0000-00-00', 'Perempuan', 'Islam', 'poto-1.jpg'),
('Betty', NULL, 0, '393792', '10 IPS-2', 'Na Yuta', 'Drop Out', 'Gemawang RT 01, RW 02', 'Girimarto', 'Wonogiri', 'Jawa Tengah', '082638163219', 'Solo', '2006-06-12', 'Perempuan', 'Islam', 'poto-1.jpg'),
('Enca Ditha', NULL, 0, '399201', '10 MIPA-1', 'Ghea', 'Aktif', 'Gemawang', 'Girimarto', 'Wonogiri', 'Jawa Tengah', '838328739', 'Sidoharjo', '2005-10-02', 'Perempuan', 'Islam', 'poto-1.jpg'),
('Radhita Canavarissa', NULL, 0, '402839', '10 MIPA-4', 'Lisa Manoban', 'Aktif', 'Doho Lor RT 02, RW 03', 'Girimarto', 'Wonogiri', 'Jawa Tengah', '082973818232', 'Surabaya', '2003-10-21', 'Perempuan', 'Islam', 'poto-1.jpg'),
('Hyunsuk', NULL, 56, '436839', '10 MIPA-2', 'Lisa Manoban', 'Aktif', 'Doho Kidul RT 03, RW 01', 'Girimarto', 'Wonogiri', 'Jawa Tengah', '8283863823', 'Wonogiri', '0000-00-00', 'Laki-Laki', 'Islam', 'poto-1.jpg'),
('Yuna', NULL, 0, '592738', '10 MIPA-1', 'Na Yuta', 'Non Aktif', 'Sanan ', 'Girimarto', 'Wonogiri', 'Jawa Tengah', '082972861921', 'Surakarta', '2006-06-25', 'Perempuan', 'Kristen', 'poto-1.jpg'),
('Naurah Gardenifa', NULL, 0, '729361', '10 MIPA-2', 'Jung Jaehyun', 'Aktif', 'Bubakan', 'Girimarto', 'Wonogiri', 'Jawa Tengah', '0829278163816', 'Bandung', '2009-03-11', 'Perempuan', 'Islam', 'poto-1.jpg'),
('Lee Haechan', NULL, 0, '827392', '10 MIPA-5', 'Jung Jaehyun', 'Lulus', 'Doho Kidul RT 01, RW 01', 'Girimarto', 'Wonogiri', 'Jawa Tengah', '0827392738112', 'Wonogiri', '2009-06-06', 'Laki-Laki', 'Islam', 'poto-1.jpg'),
('Kya', NULL, 0, '868687', '10 MIPA-1', 'Jung Jaehyun', 'Lulus', 'Nungkulan', 'Girimarto', 'Wonogiri', 'Jawa Tengah', '08283783628', 'Bandung', '2006-06-02', 'Perempuan', 'Islam', 'poto-1.jpg');

--
-- Triggers `siswa`
--
DELIMITER $$
CREATE TRIGGER `after_siswa_tambah` AFTER INSERT ON `siswa` FOR EACH ROW BEGIN
INSERT INTO dsiswa
SET aksi = 'tambah',
nama_siswa = NEW.nama_siswa,
nis = NEW.nis,
kota = NEW.kota,
tgl_ubah = NOW();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_siswa_delete` BEFORE DELETE ON `siswa` FOR EACH ROW BEGIN
INSERT INTO dsiswa
SET aksi = 'delete',
nama_siswa = OLD.nama_siswa,
nis = OLD.nis,
kota = OLD.kota,
tgl_ubah = NOW();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_siswa_update` BEFORE UPDATE ON `siswa` FOR EACH ROW BEGIN
INSERT INTO dsiswa
SET aksi = 'update',
nama_siswa = OLD.nama_siswa,
nis = OLD.nis,
kota = OLD.kota,
tgl_ubah = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `system_login`
--

CREATE TABLE `system_login` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `level` enum('admin','guru','siswa','orang_tua') NOT NULL,
  `poto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_login`
--

INSERT INTO `system_login` (`admin_id`, `username`, `password`, `email`, `nama_lengkap`, `level`, `poto`) VALUES
(1, 'ardhiani', '680e89809965ec41e64dc7e447f175ab', 'ardhiani@gmail.com', 'Ardhiani Laura', 'admin', 'poto-1.jpg'),
(3, 'leetaeyong', '576fcac020be0cb079bce75b692d2157', 'leetaeyong@gmail.com', 'Lee Taeyong', 'guru', 'poto-1.jpg'),
(4, 'jaehyun', 'd9e7f4d9a1f8c4bbcc08aca77e1efa37', 'jaehyun@gmail.com', 'Jung Jaehyun', 'guru', 'poto-4.png'),
(5, 'kun', '51711d3cb95945007b827cb703fcf398', 'qiankun@gmail.com', 'Qian Kun', 'guru', 'poto-1.jpg'),
(6, 'jisung', '098840577765481ebaee36e1742b67d2', 'parkjisung@gmail.com', 'Park Jisung', 'siswa', ''),
(7, 'nayuta', '3ed5040b056f5d43c2089d93a925cd04', 'nayuta@gmail.com', 'Na Yuta', 'guru', ''),
(9, 'parksiwon', '9530d8762511a22bf3c9e6be79972276', 'parksiwon@gmail.com', 'Park Siwon', 'orang_tua', ''),
(10, 'renjun', '71e8f6ccf92583eae4cd09b13f5b078d', 'huangrenjun@gmail.com', 'Huang Renjun', 'siswa', 'poto-1.jpg'),
(11, 'huangxuxi', 'c5cc7e3d7363c29e85710614751626a2', 'huangxuxi@gmail.com', 'Huang Xuxi', 'orang_tua', 'poto-1.jpg'),
(12, 'popo', '3b2285b348e95774cb556cb36e583106', 'popo@gmail.com', 'Popo', 'siswa', 'poto-1.jpg'),
(13, 'ardian', '46632a526b980b41478ca6078fb02c28', 'ardian@gmail.com', 'Ardian Sri', 'orang_tua', 'poto-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tentang_sekolah`
--

CREATE TABLE `tentang_sekolah` (
  `tentang_sekolah_id` int(11) NOT NULL,
  `profil` varchar(1000) NOT NULL,
  `visi` varchar(255) NOT NULL,
  `misi` varchar(255) NOT NULL,
  `NPSN` int(50) NOT NULL,
  `Alamat Sekolah` varchar(255) NOT NULL,
  `Website` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tentang_sekolah`
--

INSERT INTO `tentang_sekolah` (`tentang_sekolah_id`, `profil`, `visi`, `misi`, `NPSN`, `Alamat Sekolah`, `Website`, `Email`) VALUES
(1, 'SMA Negeri 1 Girimarto (disebut juga dengan nama Smato) adalah sekolah menengah atas yang terletak di Girimarto, Kabupaten Wonogiri.', 'Yang dimaksud dengan visi adalah gambaran masa depan yang diinginkan oleh sekolah. Visi merupakan sumber arahan dalam melaksanakan kegiatan belajar mengajar di sekolah agar sekolah dapat menjamin kelangsungan hidup dan perkembangannya. Di SMA NEGERI 1 GIR', 'Yang dimaksud dengan misi adalah tindakan atau usaha untuk mewujudkan / merealisasikan visi yang telah ditentukan. Dengan kata lain bahwa misi adalah bentuk layanan sekolah dalam memenuhi tuntutan yang dituangkan dalam visi. Sedangkan misi di SMA NEGERI 1', 20311306, 'Jalan Maron - Girimarto, Girimarto, Wonogiri, Jawa Tengah', 'www.sman1girimarto.sch.id', 'smagirimarto@yahoo.co.id');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indexes for table `dsiswa`
--
ALTER TABLE `dsiswa`
  ADD PRIMARY KEY (`dsiswa_id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `hubungi`
--
ALTER TABLE `hubungi`
  ADD PRIMARY KEY (`hubungi_id`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`identitas_id`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`kode_mapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`nilai_id`),
  ADD KEY `kode_mapel` (`kode_mapel`),
  ADD KEY `nis` (`nis`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `orang_tua`
--
ALTER TABLE `orang_tua`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`system_login_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `orang_tua_id` (`orang_tua_id`);

--
-- Indexes for table `system_login`
--
ALTER TABLE `system_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tentang_sekolah`
--
ALTER TABLE `tentang_sekolah`
  ADD PRIMARY KEY (`tentang_sekolah_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `kode_kelas` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dsiswa`
--
ALTER TABLE `dsiswa`
  MODIFY `dsiswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;

--
-- AUTO_INCREMENT for table `hubungi`
--
ALTER TABLE `hubungi`
  MODIFY `hubungi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `identitas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `orang_tua`
--
ALTER TABLE `orang_tua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `system_login`
--
ALTER TABLE `system_login`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tentang_sekolah`
--
ALTER TABLE `tentang_sekolah`
  MODIFY `tentang_sekolah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `admin_id` FOREIGN KEY (`admin_id`) REFERENCES `system_login` (`admin_id`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`kode_mapel`) REFERENCES `mata_pelajaran` (`kode_mapel`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`nik`) REFERENCES `guru` (`nik`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `nilai_ibfk_5` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `system_login` (`admin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
